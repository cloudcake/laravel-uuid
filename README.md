<p align="center">
  <img src="https://user-images.githubusercontent.com/1300442/62399645-cc51dd00-b57c-11e9-980f-183f92e6828f.png" width="500">
  <h4 align="center">Incredibly simple UUID's for Laravel's Eloquent models.</h4>
</p>

## Installation
Install via composer using `composer require larashim/uuid`

## Usage

### Primary Key UUID's

- Add the `Larashim\Uuid\Traits\UuidPrimaryKey` trait to the eloquent model
- Add the primary key column name if you're not using the default of `id` (Optional)

```php
use Larashim\Uuid\Traits\UuidPrimaryKey;

class User extends Authenticatable
{
    use UuidPrimaryKey;
    
    protected $primaryKey = 'id';
}
```

### Additional Field UUID's

- Add the `Larashim\Uuid\Traits\Uuid` trait to the eloquent model
- Add the name of the UUID column
```php
use Larashim\Uuid\Traits\Uuid;

class User extends Authenticatable
{
    use Uuid;
    
    protected $uuidKeyName = 'uuid';
}
```

## Additional Options
Add any/all of the following to your model(s) to fine-tune the package to your needs.

| Attribute    | Description                                                                          |
-------------- | -------------------------------------------------------------------------------------|
| $uuidKey     | The name of the UUID column in the database. Defaults to `uuid`.                     |
| $uuidOrdered | Whether or not the UUID should use timestamp ordering. Defaults to `true`.           |

Example:

```php
use Larashim\Uuid\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use Uuid;
    
    /**
     * The name of the UUID column in the database.
     *
     * @var string
     */
    protected $uuidKey = 'universally_unique_id';
    
    /**
     * Whether or not the UUID should use timestamp ordering.
     *
     * @var bool
     */
    protected $uuidOrdered = true;
}
```
