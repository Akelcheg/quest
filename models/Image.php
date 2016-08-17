<?php
namespace app\models;

use yii\base\Model;
use yii\web\HttpException;
use yii\web\UploadedFile;

class Image extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg,jpeg'],
        ];
    }

    public function saveQuestImage($questId)
    {
        $path = $this->createQuestFolder($questId);
        $this->saveImage($path, 'main');
        $this->createQuestThumb($questId);
        //$this->saveImage($path, 'thumb');
        return true;
    }

    public function createQuestThumb($questId)
    {
        return $this->resize(780, 440, $questId);
    }

    public function createQuestFolder($questId)
    {
        if (!is_dir('img/quest-images/' . $questId)) {
            mkdir('img/quest-images/' . $questId);
        }
        return 'img/quest-images/' . $questId . '/';
    }


    public function saveImage($path, $name)
    {
        if ($this->validate()) {
            //$this->imageFile->saveAs($path . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            $this->imageFile->saveAs($path . $name . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }

    public function resize($max_width, $max_height, $questId)
    {
        $directory = 'img/quest-images/' . $questId . '/';
        $image = null;
        switch (strtolower($this->imageFile->extension)) {
            case 'jpeg':
                $image = imagecreatefromjpeg($directory . 'main' . '.' . $this->imageFile->extension);
                break;
            case 'jpg':
                $image = imagecreatefromjpeg($directory . 'main' . '.' . $this->imageFile->extension);
                break;
            case 'png':
                $image = imagecreatefrompng($directory . 'main' . '.' . $this->imageFile->extension);
                break;
            case 'gif':
                $image = imagecreatefromgif($directory . 'main' . '.' . $this->imageFile->extension);
                break;
            default:
                exit('Unsupported type: ' . $_FILES['image']['type']);
        }

        $old_width = imagesx($image);
        $old_height = imagesy($image);

        $scale = min($max_width / $old_width, $max_height / $old_height);
        $new_width = ceil($scale * $old_width);
        $new_height = ceil($scale * $old_height);
        $new = imagecreatetruecolor($new_width, $new_height);

        imagecopyresampled($new, $image,
            0, 0, 0, 0,
            $new_width, $new_height, $old_width, $old_height);
        ob_start();
        imagejpeg($new, NULL, 100);
        $data = ob_get_clean();
        file_put_contents($directory . 'logo_small' . '.' . $this->imageFile->extension, $data);
    }

}