<?php

namespace App\Models;

use System\Model;

class LanguagesModel extends Model
{
     /**
     * Table name
     *
     * @var string
     */
    protected $table = 'languages';

     /**
     * Create New Category Record
     *
     * @return void
     */


     public function all()
     {

         return  $this->select('*')->from('languages')->orderBy('is_sort' ,"ASC")->fetchAll();

     }

     public function createWord()
     {
         $languages=  $this->select('*')->from('languages')->orderBy('is_sort' ,"ASC")->fetchAll();
         foreach ($languages as $key => $language) {

           $this->data('name',$this->request->post('name'))
                ->data('language_name',$this->request->post('name'))
                ->data('language_id', $language->id)
                ->insert("language_content");
         }
     }

     public function show()
     {
         return  $this->select('*')->from('languages')->orderBy('is_sort' ,"ASC")->fetchAll();
     }
    public function create()
    {
      $last=$this->data('name', $this->request->post('name_l'))
             ->data('short_name', $this->request->post('short_name_l'))
             ->data('flag', $this->request->post('flag_l'))
             ->data('is_sort', $this->request->post('is_sort'))
             ->data('status', $this->request->post('status_l'))
             ->insert($this->table)->lastId();

                  $keys =  $this->select('DISTINCT name')->from('language_content')->fetchAll();

                  foreach ($keys AS $key) {
                        $this->data('language_id', $last)
                             ->data('name', $this->request->post($key->name))
                             ->data('language_name', $key->name)
                             ->insert("language_content");
                  }


        


    }


    public function is_default($id)
    {
      $this->data('is_default',0)->where('id<>?' , $id)->update('languages');
      $this->data('is_default',1)->where('id=?' , $id)->update('languages');
    }

    public function update($id)
    {
        $this->data('name', $this->request->post('name_l'))
              ->data('short_name', $this->request->post('short_name_l'))
              ->data('flag', $this->request->post('flag_l'))
              ->data('is_sort', $this->request->post('is_sort'))
              ->data('status', $this->request->post('status_l'))
              ->where('id=?', $id)
              ->update($this->table);
    }

    public function selectLanguage()
    {
      return  $this->select('DISTINCT name')->from('language_content')->fetchAll();

    }


    public function list($id)
    {
        return  $this->select('*')->from('language_content')->where('language_id = ?' , $id)->fetchAll();
    }
    public function list_delete($id)
    {
        return  $this->where('id = ?', $id)->delete('language_content');
    }


    public function update_content($id)
    {
        return $this->data('language_name', $this->request->post('language_name'))
              ->where('id=?', $id)
              ->update("language_content");
    }
    public function get_content($id)
    {
      return $this->select('*')->from('language_content')->where('id = ?' , $id)->fetch();
    }








          private function uploadExcel()
          {
              $excel = $this->request->file('excel');
              if (!$excel->exists()) {
                  return '';
              }
              return $excel->moveTo($this->app->file->toPublic('temp'));
          }


                public function addExcel($languageId)
                {


                      $excel = $this->uploadExcel();
                      if ($excel) {

                                require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/System/PHPExcel/PHPExcel.php';
                                require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/System/PHPExcel/PHPExcel/IOFactory.php';

                                $path = $_SERVER['DOCUMENT_ROOT'] . '/public/temp/'.$excel;
                                $objPHPExcel = \PHPExcel_IOFactory::load($path);

                                $objPHPExcel->setActiveSheetIndex(0);
                                $worksheet = $objPHPExcel->getActiveSheet();
                                $worksheetTitle     = $worksheet->getTitle();
                                $highestRow         = $worksheet->getHighestRow();
                                $highestColumn      = $worksheet->getHighestColumn();
                                $highestColumnIndex = \PHPExcel_Cell::columnIndexFromString($highestColumn);
                                $nrColumns = ord($highestColumn) - 64;
                                $check_submit=array();


                                $this->where('language_id = ?', $languageId)->delete('language_content');



                                $import_excel=1;
                                $this->data('import_excel',$import_excel)
                                      ->where('id=?', $languageId)
                                      ->update("languages");


                              for ($row = 1; $row <= $highestRow;$row++)
                              {
                                  $title = $worksheet->getCellByColumnAndRow(0,$row);
                                  $title = $title->getCalculatedValue();
                                  $title_translate = $worksheet->getCellByColumnAndRow(1,$row);
                                  $title_translate = $title_translate->getCalculatedValue();
                                  $this->data('name',$title)
                                       ->data('language_name', $title_translate)
                                       ->data('language_id', $languageId)
                                       ->insert("language_content");
                              }


                      }


                }






}
