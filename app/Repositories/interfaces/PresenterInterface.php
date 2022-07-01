<?php
    
    namespace App\Repositories\interfaces;

    use Illuminate\Database\Eloquent\Collection;
    
    interface PresenterInterface
    {
       public  function  transform(Collection $record): array | Collection;
    }