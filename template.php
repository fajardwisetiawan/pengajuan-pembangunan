<?php
// Load file koneksi.php
include "koneksi.php";
// Load plugin PHPExcel nya
require_once 'PHPExcel/PHPExcel.php';

// Panggil class PHPExcel nya
$excel = new PHPExcel();

// Settingan awal fil excel
$excel->getProperties()->setCreator('Ajang')
					   ->setLastModifiedBy('FAJARODS')
					   ->setTitle("Data Pembangunan")
					   ->setSubject("Pembangunan")
					   ->setDescription("Template Rencana Pembangunan")
					   ->setKeywords("Data Pembangunan");

// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
$style_col = array(
	'font' => array('bold' => true), // Set font nya jadi bold
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	),
	'borders' => array(
		'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
		'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
		'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
		'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	)
);

// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
$style_row = array(
	'alignment' => array(
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	),
	'borders' => array(
		'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
		'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
		'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
		'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	)
);

$excel->setActiveSheetIndex(0)->setCellValue('A1', "Rencana Pembangunan (Isi sesuai dengan pembangunan yang akan dilaksanakan)"); // Set kolom A1 dengan tulisan "DATA SISWA"
$excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
$excel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
$excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
$excel->getActiveSheet()->getStyle('D4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
$excel->getActiveSheet()->getStyle('E4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

// Buat header tabel nya pada baris ke 3
$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "No"
$excel->setActiveSheetIndex(0)->setCellValue('B3', "Jenis Kegiatan"); // Set kolom B3 dengan tulisan "Jenis Kegiatan"
$excel->setActiveSheetIndex(0)->setCellValue('C3', "Nilai RAB"); // Set kolom C3 dengan tulisan "Nilai RAB"
$excel->setActiveSheetIndex(0)->setCellValue('D3', "Judul Kegiatan"); // Set kolom D3 dengan tulisan "Judul Kegiatan"
$excel->setActiveSheetIndex(0)->setCellValue('E3', "Deskripsi Kegiatan"); // Set kolom E3 dengan tulisan "Deskripsi Kegiatan"

// Buat header tabel nya pada baris ke 4
$excel->setActiveSheetIndex(0)->setCellValue('A4', ""); // Set kolom A3 dengan tulisan "No"
$excel->setActiveSheetIndex(0)->setCellValue('B4', "Masukan Jenis Kegiatan"); // Set kolom C3 dengan tulisan "Jenis Kegiatan"
$excel->setActiveSheetIndex(0)->setCellValue('C4', "Masukkan Nilai RAB"); // Set kolom D3 dengan tulisan "NIlai RAB"
$excel->setActiveSheetIndex(0)->setCellValue('D4', "Masukan Judul Kegiatan"); // Set kolom E3 dengan tulisan "Judul Kegiatan"
$excel->setActiveSheetIndex(0)->setCellValue('E4', "Masukan Deskripsi Kegiatan"); // Set kolom F3 dengan tulisan "Deskripsi Kegiatan"


// Set height baris ke 1, 2 dan 3
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);

// Apply style header yang telah kita buat tadi ke masing-masing kolom header
$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);


// Set orientasi kertas jadi LANDSCAPE
$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

// Set judul file excel nya
$excel->getActiveSheet(0)->setTitle("Template Rencana Pembangunan");
$excel->setActiveSheetIndex(0);

// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Template Rencana Pembangunan".xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$write->save('php://output');
?>
