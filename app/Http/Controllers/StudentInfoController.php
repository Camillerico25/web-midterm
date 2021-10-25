<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudentInfoRequest;
use App\Http\Requests\UpdateStudentInfoRequest;
use App\Repositories\StudentInfoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class StudentInfoController extends AppBaseController
{
    /** @var  StudentInfoRepository */
    private $studentInfoRepository;

    public function __construct(StudentInfoRepository $studentInfoRepo)
    {
        $this->studentInfoRepository = $studentInfoRepo;
    }

    /**
     * Display a listing of the StudentInfo.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $studentInfos = $this->studentInfoRepository->all();

        return view('student_infos.index')
            ->with('studentInfos', $studentInfos);
    }

    /**
     * Show the form for creating a new StudentInfo.
     *
     * @return Response
     */
    public function create()
    {
        return view('student_infos.create');
    }

    /**
     * Store a newly created StudentInfo in storage.
     *
     * @param CreateStudentInfoRequest $request
     *
     * @return Response
     */
    public function store(CreateStudentInfoRequest $request)
    {
        $input = $request->all();

        $studentInfo = $this->studentInfoRepository->create($input);

        Flash::success('Student Info saved successfully.');

        return redirect(route('studentInfos.index'));
    }

    /**
     * Display the specified StudentInfo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $studentInfo = $this->studentInfoRepository->find($id);

        if (empty($studentInfo)) {
            Flash::error('Student Info not found');

            return redirect(route('studentInfos.index'));
        }

        return view('student_infos.show')->with('studentInfo', $studentInfo);
    }

    /**
     * Show the form for editing the specified StudentInfo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $studentInfo = $this->studentInfoRepository->find($id);

        if (empty($studentInfo)) {
            Flash::error('Student Info not found');

            return redirect(route('studentInfos.index'));
        }

        return view('student_infos.edit')->with('studentInfo', $studentInfo);
    }

    /**
     * Update the specified StudentInfo in storage.
     *
     * @param int $id
     * @param UpdateStudentInfoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStudentInfoRequest $request)
    {
        $studentInfo = $this->studentInfoRepository->find($id);

        if (empty($studentInfo)) {
            Flash::error('Student Info not found');

            return redirect(route('studentInfos.index'));
        }

        $studentInfo = $this->studentInfoRepository->update($request->all(), $id);

        Flash::success('Student Info updated successfully.');

        return redirect(route('studentInfos.index'));
    }

    /**
     * Remove the specified StudentInfo from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $studentInfo = $this->studentInfoRepository->find($id);

        if (empty($studentInfo)) {
            Flash::error('Student Info not found');

            return redirect(route('studentInfos.index'));
        }

        $this->studentInfoRepository->delete($id);

        Flash::success('Student Info deleted successfully.');

        return redirect(route('studentInfos.index'));
    }
}
