<?php
/*Written by SampanBuruk*/


// Set the path to the directory containing the input files
$inputDirPath = 'C:\Users\ariff\Desktop\HeryTech\data\datas\datas';

// Set the path to the directory to write the output files
$outputDirPath = 'C:\Users\ariff\Desktop\HeryTech\data\datas\converted';

// Get a list of all .txt files in the input directory
$files = glob("$inputDirPath/*.txt");

// Loop through each file and convert it to HTML
foreach ($files as $inputFilePath) {
    // Create the output file path by replacing the .txt extension with .html
    $outputFilePath = str_replace('.txt', '.html', $inputFilePath);

    // Replace the input directory path with the output directory path in the output file path
    $outputFilePath = str_replace($inputDirPath, $outputDirPath, $outputFilePath);

    // Read the contents of the input file
    $content = file_get_contents($inputFilePath);

    // Escape any HTML characters in the text
    $content = htmlspecialchars($content, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8', true);

    // Create the HTML file and write the contents
    file_put_contents($outputFilePath, "<html><head><title>Converted File</title></head><body><pre>$content</pre></body></html>");

    // Print a message to indicate the file has been converted
    echo "File $inputFilePath converted to $outputFilePath<br>";
}

// Print a message to indicate all files have been converted
echo 'All files converted successfully';
