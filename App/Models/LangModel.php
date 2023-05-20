<?php

namespace App\Models;

use System\Model;

class LangModel extends Model
{
     /**
     * Table name
     *
     * @var string
     */
    protected $table = 'language_content';

     /**
     * Loaded Lang
     *
     * @var array
     */
    private $language_content = [];

     /**
     * Load And Store All settings in the database
     *
     * @return void
     */
    public function loadAll()
    {

      if ($this->session->has('lang_id'))
      {
        $lang_id = $this->session->get('lang_id');
            $language = $this->where('language_id=?' , $lang_id)->fetchall($this->table);
      }
      else
      {
          $language =  $this->select('l_c.*')
                                 ->from('language_content l_c')
                                 ->join('LEFT JOIN languages l ON l.id=l_c.language_id')
                                 ->where('l.is_default=?',1)
                                 ->fetchall();

                                 $lang_id=1;


      }


        foreach ($language AS $lang) {
            $this->language_content[$lang->name] = $lang->language_name;
        }
        $this->language_content["lang_id"]=$lang_id;

        return   $this->language_content;







    }



        public function getActiveLanguage()
        {

          if ($this->session->has('lang_id'))
          {
            $lang_id = $this->session->get('lang_id');
          }
          else
          {
            $lang_id=1;


          }

            return   $lang_id;
        }



     /**
     * Get Lang By Key
     *
     * @param string $key
     * @return mixed
     */
    public function get($key)
    {
        return array_get($this->language_content, $key);
    }

    public function Setlang($id)
    {
        $this->session->set('lang_id',$id);
    }

}
