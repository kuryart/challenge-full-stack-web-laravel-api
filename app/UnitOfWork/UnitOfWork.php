<?php

namespace App\UnitOfWork;

use Illuminate\Support\Facades\DB;
use App\UnitOfWork\Interfaces\UnitOfWorkInterface;

class UnitOfWork implements UnitOfWorkInterface
{
    private $inTransaction = false;

    private static $runningTransactions = 0;

    public function begin()
    {
        if (static::$runningTransactions > 0) {
            return $this;
        }
        // nothing to do, will not start nested transaction

        $this->inTransaction = true;
        static::$runningTransactions++;
        DB::beginTransaction();

        return $this;
    }

    public function commit()
    {
        if (!$this->inTransaction) {
            return $this;
        }

        DB::commit();
        $this->inTransaction = false;
        static::$runningTransactions--;

        return $this;
    }

    public function rollback()
    {
        if (!$this->inTransaction) {
            return $this;
        }

        DB::rollBack();
        $this->inTransaction = false;
        static::$runningTransactions--;

        return $this;
    }

    function __destruct()
    {
        // rollback if not committed
        if ($this->inTransaction) {
            $this->rollback();
        }
    }
}
