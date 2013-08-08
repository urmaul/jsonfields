<?php

class JsonFieldsBehavior extends CActiveRecordBehavior
{
    public $attributes;

    public $arrayMode = true;

    public function attach($owner)
    {
        parent::attach($owner);

        if ( isset($this->attributes) ) {
            if ( is_string($this->attributes) )
                $this->attributes = explode(',', $this->attributes);
			
			$this->attributes = array_map('trim', $this->attributes);

        } else {
            $this->enabled = false;
        }
    }

    public function afterFind($event)
    {
        $this->decode();
        return parent::afterFind($event);
    }

    public function beforeSave($event)
    {
        $this->encode();
        return parent::beforeSave($event);
    }

    public function afterSave($event)
    {
        parent::afterSave($event);
        $this->decode();
    }


    protected function encode()
    {
        foreach ($this->attributes as $attribute) {
            $this->owner->$attribute = json_encode($this->owner->$attribute);
        }
    }

    protected function decode()
    {
        foreach ($this->attributes as $attribute) {
            $this->owner->$attribute = json_decode($this->owner->$attribute, $this->arrayMode);
        }
    }
}
