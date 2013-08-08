# JsonFields Yii Behavior

Yii CActiveRecord behavior that allows to create array attributes which are stored in DB using json.

## How to use

TODO: add comments

### How to attach

```php
public function behaviors()
{
    return array(
        array(
            'class' => 'ext.jsonfields.JsonFieldsBehavior',
            'attributes' => 'customParams',
            'arrayMode' => true,
        ),
    );
}
```

## Settings

TODO: add comments

* *attributes*
* *arrayMode*
