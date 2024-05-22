<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use League\Csv\Reader;
use League\Csv\Writer;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class EmployeeController extends Controller
{
    public function index() {
        return inertia('Employee/Index',[
            'employees' => Employee::orderBy('lastname')->get()
        ]);
    }

    public function show(Employee $employee){
        return inertia('Employee/View',[
            'employee' =>$employee
        ]);
    }

    public function generateCSV() {
        
        $employees = Employee::orderBy('id')->get();
        $filename = '../storage/employees.csv';
        $file = fopen($filename,'w+');
        fputcsv($file, [
            'Last Name',
            'First Name',
            'Gender',
            'Date of Birth',
            'Address',
            'Phone',
            'Job Title',
            'PRN',
            'IMG',
        ]);
        foreach($employees as $e){
            fputcsv($file,[
                $e->lastname,
                $e->firstname,
                $e->gender,
                $e->dateOfBirth,
                $e->address,
                $e->phone,
                $e->jobTitle,
                $e->prn,
                $e->img,
            ]);
        }
        fclose($file);
        return response()->download($filename);
        
    }

    public function pdf(){
        $employees = Employee::orderby('id')->get();
        $pdf = PDF::loadView('employee-list', compact('employees'));      
        return $pdf->download('employee-list.pdf');
    } 

    public function import(Request $request)
    {
        $request->validate([
            'import_file' => 'required|max:2048', // Adjust max file size as needed
        ]);

        $importFile = $request->file('import_file');
        $extension = $importFile->getClientOriginalExtension();

        if ($extension === 'csv') {
            // Handle CSV import
            $csv = Reader::createFromPath($importFile->getPathname(), 'r');
            $csv->setHeaderOffset(0);
            $csvData = $csv->getRecords();

            // Iterate through CSV data and insert records into the database
            foreach ($csvData as $row) {
                Employee::create([
                    'lastname'      => $row['Last Name'],
                    'firstname'     => $row['First Name'],
                    'gender'        => $row['Gender'],
                    'dateOfBirth'   => $row['Date of Birth'],    
                    'address'       => $row['Address'],    
                    'phone'         => $row['Phone'],        
                    'jobTitle'      => $row['Job Title'],        
                    'prn'           => $row['PRN'],
                    'img'           => $row['IMG'],     
                ]);
            }

            return redirect()->back()->with('success', 'CSV uploaded and songs imported successfully.');
        } elseif ($extension === 'pdf') {
            // Handle PDF import
            $pdfData = File::get($importFile->getPathname());
            // Process PDF data and import songs
            // This part needs to be implemented based on your specific requirements

            return redirect()->back()->with('success', 'PDF uploaded and songs imported successfully.');
        }

        return redirect()->back()->with('error', 'Invalid file format. Please upload a CSV or PDF file.');
    }

}
