<?php
header('Content-Type: text/html; charset=utf-8');
echo "<h2>System Diagnostic & Auto-Fix</h2>";

$publicPath = realpath(__DIR__);
echo "<b>Public Path:</b> " . htmlspecialchars($publicPath) . "<br><br>";

$storage = __DIR__ . '/storage';
echo "<b>Checking 'public/storage':</b><br>";

// 1. Create storage folder if missing
if (!file_exists($storage)) {
    echo "- 'public/storage' does NOT exist. <b>Attempting to create it...</b><br>";
    if (mkdir($storage, 0777, true)) {
        echo "- Folder 'public/storage' created successfully!<br>";
    } else {
        echo "- <span style='color:red;'>Failed to create 'public/storage'. Please create it manually via FileZilla inside '/htdocs/public/'.</span><br>";
    }
}

if (file_exists($storage)) {
    if (is_link($storage)) {
        echo "- Type: <b>SYMLINK</b> (You must delete this link in FileZilla first!)<br>";
    } else if (is_dir($storage)) {
        echo "- Type: <b>REAL DIRECTORY</b><br>";
        
        // 2. Create cover folder if missing
        $cover = $storage . '/cover';
        if (!file_exists($cover)) {
            echo "- 'public/storage/cover' does NOT exist. <b>Attempting to create it...</b><br>";
            if (mkdir($cover, 0777, true)) {
                echo "- Folder 'public/storage/cover' created successfully!<br>";
            } else {
                echo "- <span style='color:red;'>Failed to create 'public/storage/cover'.</span><br>";
            }
        }
        
        // 3. Scan old storage folder and copy existing covers
        $oldCoverPath = dirname(__DIR__) . '/storage/app/public/cover';
        if (file_exists($oldCoverPath) && is_dir($oldCoverPath)) {
            echo "<br><b>Found old storage folder at:</b> " . htmlspecialchars($oldCoverPath) . "<br>";
            $oldFiles = array_diff(scandir($oldCoverPath), array('.', '..'));
            echo "- Found " . count($oldFiles) . " covers in old directory.<br>";
            
            if (count($oldFiles) > 0) {
                echo "<b>Copying covers to new public directory...</b><br>";
                $copiedCount = 0;
                foreach ($oldFiles as $file) {
                    $srcFile = $oldCoverPath . '/' . $file;
                    $destFile = $cover . '/' . $file;
                    
                    // Copy if destination doesn't exist
                    if (!file_exists($destFile)) {
                        if (copy($srcFile, $destFile)) {
                            echo "- Copied: " . htmlspecialchars($file) . "<br>";
                            $copiedCount++;
                        } else {
                            echo "- <span style='color:red;'>Failed to copy: " . htmlspecialchars($file) . "</span><br>";
                        }
                    } else {
                        echo "- Already exists: " . htmlspecialchars($file) . "<br>";
                    }
                }
                echo "<b>Finished copying.</b> Copied $copiedCount files.<br>";
            }
        } else {
            echo "<br><b>Old storage cover directory not found at:</b> " . htmlspecialchars($oldCoverPath) . "<br>";
        }
        
        // 4. List contents of the new folder
        if (file_exists($cover) && is_dir($cover)) {
            echo "<br><b>Current contents of public/storage/cover:</b><br><pre>";
            $files = scandir($cover);
            print_r($files);
            echo "</pre>";
        }
    }
}
