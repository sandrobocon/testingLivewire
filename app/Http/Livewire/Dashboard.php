<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

    public $sortField = 'title';
    public $sortDirection = 'asc';
    public $showDeleteModal = false;
    public $showEditModal = false;
    public $showFilters = false;
    public $selectPage = false;
    public $selectAll = false;
    public $selected = [];
    public $filters = [
        'search' => '',
        'status' => '',
        'amount-min' => null,
        'amount-max' => null,
        'date-min' => null,
        'date-max' => null,
    ];
    public Transaction $editing;

    protected $queryString = ['sortField', 'sortDirection'];

    public function rules()
    {
        return [
            'editing.title'  => 'required|min:3',
            'editing.amount' => 'required',
            'editing.status' => 'required|in:' . collect(Transaction::STATUSES)->keys()->implode(','),
            'editing.date_for_editing'   => 'required',
        ];
    }

    public function mount()
    {
        $this->editing = $this->makeBlankTransaction();
    }

    public function updatedFilters() // Important refresh page!!
    {
        $this->resetPage();
    }

    public function updatedSelected()
    {
        $this->selectAll = false;
        $this->selectPage = false;
    }

    public function updatedSelectPage($value)
    {
        $this->selected = $value
            ? $this->transactions->pluck('id')->map(fn($id) => (string) $id)
            : [];
    }

    public function selectAll()
    {
        $this->selectAll = true;
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }

    public function exportSelected()
    {
        return response()->streamDownload(function () {
            echo (clone $this->transactionsQuery)
                ->unless($this->selectAll, fn($query) => $query->whereKey($this->selected))
                ->toCsv();
        }, 'transaction.csv');
    }

    public function deleteSelected()
    {
        (clone $this->transactionsQuery)
            ->unless($this->selectAll, fn($query) => $query->whereKey($this->selected))
            ->delete();

        $this->showDeleteModal = false;
        $this->selectPage = false;
    }

    public function makeBlankTransaction()
    {
        return Transaction::make(['date' => now(), 'status' => 'success']);
    }

    public function create()
    {
        if ($this->editing->getKey()) {  // Check if there is any inserted data (don't overwrite user inserted data)
            $this->editing = $this->makeBlankTransaction();
        }
        $this->showEditModal = true;
    }

    public function edit(Transaction $transaction)
    {
        if ($this->editing->isNot($transaction)) { // Check if there is any inserted data (don't overwrite user inserted data)
            $this->editing = $transaction;
        }

        $this->showEditModal = true;
    }

    public function save()
    {
        $this->validate();

        $this->editing->save();

        $this->showEditModal = false;
    }

    public function resetFilters()
    {
        $this->reset('filters');
    }

    public function getTransactionsQueryProperty()
    {
        return Transaction::query()
            ->when($this->filters['status'], fn($query, $status) => $query->where('status', $status))
            ->when($this->filters['amount-min'], fn($query, $amount) => $query->where('amount', '>=',  $amount))
            ->when($this->filters['amount-max'], fn($query, $amount) => $query->where('amount', '<=', $amount))
            ->when($this->filters['date-min'], fn($query, $date) => $query->where('date', '>=',  Carbon::parse($date)))
            ->when($this->filters['date-max'], fn($query, $date) => $query->where('date', '<=', Carbon::parse($date)))
            ->when($this->filters['search'], fn($query, $search) => $query->where('title', 'like', '%' . $search . '%'))
            ->orderBy($this->sortField, $this->sortDirection);
    }

    public function getTransactionsProperty()
    {
        return $this->transactionsQuery->paginate(10);
    }

    public function render()
    {
        if ($this->selectAll) {
            $this->selected = $this->transactions->pluck('id')->map(fn($id) => (string) $id);
        }

        return view('livewire.dashboard', [
            'transactions' => $this->transactions
        ])
            ->layoutData(['header' => 'Dashboard']);
    }
}
