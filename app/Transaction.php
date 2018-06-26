<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transactions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['account_id', 'description', 'amount', 'type', 'created_date'];

    /**
     * Get the account that owns the transaction.
     */
    public function account()
    {
        return $this->belongsTo('App\Account');
    }

}
