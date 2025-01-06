<?php

namespace App\Services;

use App\Repositories\Interfaces\TickerRepositoryInterface;

class TickerService
{
    protected $tickerRepository;

    public function __construct(
        TickerRepositoryInterface $tickerRepository,
    ) {
        $this->tickerRepository = $tickerRepository;
    }

    /**
     * List All Slider
     */
    public function getAlltickers(): object
    {
        return $this->tickerRepository->fetchAll();
    }

    /**
     * Store Slider
     */
    public function storetickers(array $data): void
    {
        $tickers = $this->tickerRepository->store($data);

        if (isset($data['document'])) {
            $tickers->addMedia($data['document'])->toMediaCollection('tickers');
        }
    }

    /**
     * Get By Id
     */
    public function gettickersById(string|int $tickersId): object
    {
        return $this->tickerRepository->fetch(
            id: $tickersId,
        );
    }

    /**
     * Update Slider
     */
    public function updatetickers(string|int $tickersId, array $data): object
    {
        $tickers = $this->tickerRepository->update(
            data: $data,
            id: $tickersId
        );

        if (isset($data['document'])) {
            $tickers->clearMediaCollection('tickers');
            $tickers->addMedia($data['document'])->toMediaCollection('tickers');
        }

        return $tickers;
    }

    /**
     * Delete A Slider
     */
    public function deletetickersData(string|int $tickersId): void
    {
        $this->tickerRepository->delete(
            id: $tickersId
        );
    }
}
