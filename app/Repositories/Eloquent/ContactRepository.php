<?php

namespace Repositories\Eloquent;

use App\Contact;

class ContactRepository implements ContactRepositoryInterface 
{
    /**
     * @var Contact
     */
    private $model;

    /**
     * ContactRepository constructor.
     * @param Contact $model
     */
    public function __construct(Contact $model)
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
        $contact = $this->getById($id);
        $contact->update($attributes);

        return $contact;
    }

    public function delete($id)
    {
        $this->getById($id)->delete();
        
        return true;
    }

}

?>