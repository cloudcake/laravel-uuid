# Heads up!
Since Laravel 9.x, UUID support for Eloquent is baked right into Laravel.  
See [Illuminate/Database/Eloquent/Concerns/HasUuids](https://laravel.com/api/master/Illuminate/Database/Eloquent/Concerns/HasUuids.html).  

This package is now redundant.

## Installation
Install via composer using `composer require cloudcake/laravel-uuid`

## Usage

### Primary Key UUID's
If you want to use UUID's as your model's primary key, this is for you.

- Add the `Uuid\Traits\UuidPrimaryKey` trait to the eloquent model
- Add the primary key column name if you're not using the default of `id` (Optional)

```php
use Uuid\Traits\UuidPrimaryKey;

class User extends Authenticatable
{
    use UuidPrimaryKey;

    protected $primaryKey = 'id';
}
```
Now you'll be able to call `User::find('<uuid-here>');`.

### Additional Field UUID's
In some situations you may want to retain your regular integer based primary key, but add an additional UUID column to your models, for this case, use the `Uuid` trait.

- Add the `Uuid\Traits\Uuid` trait to the eloquent model
- Add the name of the UUID column
```php
use Uuid\Traits\Uuid;

class User extends Authenticatable
{
    use Uuid;

    protected static $uuidKeyName = 'uuid';
}
```
And query it as you would any other attribute, `User::where('uuid', '<uuid-here>')->first()`.

## Additional Options
Add any/all of the following to your model(s) to fine-tune the package to your needs.

| Attribute    | Description                                                                          |
-------------- | -------------------------------------------------------------------------------------|
| $uuidKey     | The name of the UUID column in the database. Defaults to `uuid`.                     |
| $uuidOrdered | Whether or not the UUID should use timestamp ordering. Defaults to `true`.           |

Example:

```php
use Uuid\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use Uuid;

    /**
     * The name of the UUID column in the database.
     *
     * @var string
     */
    protected static $uuidKey = 'universally_unique_id';

    /**
     * Whether or not the UUID should use timestamp ordering.
     *
     * @var bool
     */
    protected static $uuidOrdered = true;
}
```
