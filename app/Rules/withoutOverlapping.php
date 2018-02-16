<?php

namespace App\Rules;

use App\Event;
use Illuminate\Contracts\Validation\Rule;

class withoutOverlapping implements Rule
{
    protected $start_date;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($start_date)
    {
        $this->start_date = $start_date;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return ($this->check($this->start_date, $value) === 0 ) ? true : false ;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'We wskazanym czasie już istnieje inne wydarzenie ';
    }
    /**
     * @param $startDate
     * @param $endDate
     * @param null $id
     * @return mixed
     */
    protected function check($startDate, $endDate, $id = null)
    {
        $event = new Event();
        return $event
            ->where('start_date', '<=', $endDate)
            ->where('end_date', '>=', $startDate)
            ->where('id', '!=', $id)
            ->count();
    }
}
