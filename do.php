<?php
require __DIR__.'/vendor/autoload.php';

    $inputFileName = "./files/taxes.xlsx";
    $info = pathinfo($inputFileName);

    $outputFileName = sprintf("%d.%s",time(), $info['extension']);
    

    $cellsMap = [
        'price' => 'B4',
        'include_tax'=> [
            'cell' => 'B5',
            'value' => '=IF(1={include_tax}, "yes", "no")'
        ]
    ];


    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);


    $item = $_POST;

    $activeSheet = $spreadsheet->getActiveSheet();

    foreach($item as $key => $value) {
        if (key_exists($key, $cellsMap)) {
            $cellInfo = $cellsMap[$key];

            if (!is_array($cellInfo)) {
                $activeSheet->setCellValue($cellInfo, $value);                
            }else {
                $cellInfoValue = str_replace(sprintf("{%s}",$key), $value, $cellInfo['value']);

                $activeSheet->setCellValue($cellInfo['cell'],$cellInfoValue);
            }
        }
    }

    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");

    
    header('Content-Type:'.$mimeType);
    header('Content-Disposition: attachment; filename='.$outputFileName);
    
    $writer->save("php://output");

