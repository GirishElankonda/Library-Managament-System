$path = "d:\Girish\code\Xampp\htdocs\Library Management System"
$files = Get-ChildItem -Path $path -Recurse -Filter "*.php"
$utf8NoBom = New-Object System.Text.UTF8Encoding($false)

foreach ($file in $files) {
    if ($file.FullName -like "*bootstrap*") { continue }
    
    $content = [System.IO.File]::ReadAllText($file.FullName)
    $fixed = $false

    # Fix literal stray text `r`n`t (literal backticks)
    if ($content.Contains('`r`n`t')) {
        $content = $content.Replace('`r`n`t', "`r`n`t")
        Write-Output "Fixed stray text in: $($file.Name)"
        $fixed = $true
    }
    
    # Fix Start of File (remove whitespace/BOM before <?php)
    $phpIndex = $content.IndexOf("<?php")
    if ($phpIndex -gt 0) {
        $prefix = $content.Substring(0, $phpIndex)
        if ($prefix -match "^[\s\xFE\xFF\xEF\xBB\xBF]+$") {
            $content = $content.Substring($phpIndex)
            Write-Output "Fixed start whitespace/BOM in: $($file.Name)"
            $fixed = $true
        }
    }
    
    # Always save as UTF8-NoBOM
    [System.IO.File]::WriteAllText($file.FullName, $content, $utf8NoBom)
}
Write-Output "Sanitation complete."
