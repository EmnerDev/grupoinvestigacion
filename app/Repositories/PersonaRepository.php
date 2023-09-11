<?php
namespace App\Repositories;

use App\Models\Persona;

class PersonaRepository extends BaseRepository
{
    public function __construct(Persona $modelo)
    {
        parent::__construct($modelo);
    }

    public function list($request = [], $with = [])
    {
        $data = $this->model->with($with)->where(function ($query) use ($request) {
            // if (! empty($request['company_id'])) {
            //     $query->where('company_id', $request['company_id']);
            // }
        });

        if (empty($request['typeData'])) {
            $data = $data->paginate($request['perPage'] ?? 10);
        } else {
            $data = $data->get();
        }

        return $data;
    }

    public function store($request)
    {
       // return $request;
        if (! empty($request->id) && $request->id != null) {

            $data = $this->model->find($request->id);

        } else {
            $data = $this->model::newModelInstance();
        }

        foreach ($request as $key => $value) {
            $data[$key] = $request->$key;
        }

        $data->save();

        return $data;
    }
}