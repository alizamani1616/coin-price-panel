<?php

namespace App\Models;

use System\Model;

class SettingsModel extends Model
{
     /**
     * Table name
     *
     * @var string
     */
    protected $table = 'settings';

     /**
     * Loaded Settings
     *
     * @var array
     */
    private $settings = [];

     /**
     * Load And Store All settings in the database
     *
     * @return void
     */
    public function loadAll()
    {
        foreach ($this->all() AS $setting) {
            $this->settings[$setting->key] = $setting->value;
        }
    }

     /**
     * Get Settings By Key
     *
     * @param string $key
     * @return mixed
     */
    public function get($key)
    {
        return array_get($this->settings, $key);
    }




  private function uploadLogo()
  {
      $logo = $this->request->file('logo');

      if (!$logo->exists()) {
          return '';
      }

      return $logo->moveTo($this->app->file->toPublic('images'));
  }




    public function updateSettings()
    {
        // pre-defined keys (settings) that will be stored in database
        $keys = ['site_name','site_title','site_address','site_email','logo'];

        foreach ($keys AS $key) {


            if($key=="logo") {
              $logo = $this->uploadLogo();
              if ($logo) {
                $this->where('`key` = ?', $key)->delete($this->table);
                  $this->data('key', $key)
                       ->data('value', $logo)
                       ->insert($this->table);
              }

            }
            else {
              $this->where('`key` = ?', $key)->delete($this->table);

              $this->data('key', $key)
                   ->data('value', $this->request->post($key))
                   ->insert($this->table);

            }


        }

    }
}
