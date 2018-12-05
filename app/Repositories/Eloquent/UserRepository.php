<?php
namespace Repositories\Eloquent;
use Models\User;



class UserRepository extends AbstractRepository implements UserRepositoryInterface
{
    /**
     * @var User
     */
    private $model;

    /**
     * UserRepository constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }
    
    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }
    
    public function update($id, array $attributes)
    {
        $user = $this->getById($id);
        $user->update($attributes);
        return $user;
    }

    public function delete($id)
    {
        $this->getById($id)->delete();
        return true;
    }
}