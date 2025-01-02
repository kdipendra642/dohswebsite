<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\TickerRequest;
use App\Services\TickerService;
use Illuminate\Support\Facades\DB;

class TickerController extends Controller
{
    protected $tickerService;

    public function __construct(
        TickerService $tickerService
    ) {
        $this->tickerService = $tickerService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $tickers = $this->tickerService->getAlltickers();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return view('backend.tickers.index', [
            'tickers' => $tickers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.tickers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TickerRequest $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();

            $this->tickerService->storetickers(
                data: $data
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('tickers.index')->with('success', 'Ticker created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $ticker = $this->tickerService->gettickersById(
                tickersId: $id
            );
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return view('backend.tickers.edit', ([
            'ticker' => $ticker,
        ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TickerRequest $request, string $id)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();

            $this->tickerService->updatetickers(
                tickersId: $id,
                data: $data
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('tickers.index')->with('success', 'Ticker updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();

        try {
            $ticker = $this->tickerService->deletetickersData(
                tickersId: $id
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('tickers.index')->with('success', 'Ticker deleted successfully.');
    }
}
