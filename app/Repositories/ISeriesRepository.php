<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;

interface ISeriesRepository
{
    public function add(SeriesFormRequest $request): Series;
}