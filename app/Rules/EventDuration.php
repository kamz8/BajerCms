<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class EventDuration implements Rule
{
    /**
     * Interval is setup of time duration of event
     * default 1 hour
     */
    protected $interval;
    protected $maxDration;
    protected $end_time;

    /**
     * Create a new rule instance.
     *
     * @param $end_time
     * @return void
     */
    public function __construct($end_time = null)
    {
        $this->interval = 1;
        $this->maxDration = 8;
        $this->end_time = Carbon::createFromFormat('Y-m-d H:i:s',$end_time);

    }

    /**
     * Determine if the validation rule passes.
     * Duration of event should be between 1 to 8 hours
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $time = $this->calcInterval($value);
        return $time >= $this->interval && $time <= $this->maxDration ;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Czas trwania wydarzenia nie może być mniejszy niż $this->interval h i dłuższy niż $this->maxDration h";
    }

    protected function calcInterval($value) {
        $start_time = Carbon::createFromFormat('Y-m-d H:i:s',$value);
        return $this->end_time->diffInHours($start_time);
    }
}
