<?php

namespace App\Http\Controllers;

use App\Repositories\ProcessRepositoryInterface;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    /**
     * @var ProcessRepositoryInterface
     */
    private ProcessRepositoryInterface $processRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProcessRepositoryInterface $processRepository) {
        $this->processRepository = $processRepository;
    }


    public function show(Request $request) {
        return $this->processRepository->show($request);
    }
}
