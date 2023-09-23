<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\User_age_catigeries;
use App\Models\Biling;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\DB;

class Registration extends Controller
{

    public function insert_data(Request $request)
    { // insert all the add user form data to the database in user table
        $user = new Register;
        $categories = new User_age_catigeries;

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|digits:10',
            'location' => 'required|in:Mumbai,Pune,Delhi,Bangalore,Chennai,Kolkata,Hyderabad,Ahmedabad,Jaipur,Lucknow',
            'dob' => 'required|before_or_equal:' . now()->subYears(5)->format('Y-m-d'),
            'password' => 'required',
        ], [
            'phone.digits' => 'The phone number must be 10 digits.',
            'dob.before_or_equal' => 'You must be at least 5 years old.',
            'location.in' => 'Please select a valid location.',
        ]);
        $user->Name = $request->input('name');
        $user->Email = $request->input('email');
        $user->Phone = $request->input('phone');
        $user->Location = $request->input('location');
        $user->Date_Of_Birth = $request->input('dob');
        $user->Password = md5($request->input('password'));

        $user->save();

        $categories->user_id = $user->registration_id;
        $age = $categories->age = date_diff(date_create($user->Date_Of_Birth), date_create('now'))->y;
        if ($age <= 18) {
            $categories->age_category = "MINOR";
        } elseif ($age > 18 && $age <= 60) {
            $categories->age_category = "ADULT";
        } elseif ($age > 60) {
            $categories->age_category = "SENIOR";
        }

        $categories->save();

        return redirect('/');
    }
    public function add()
    {
        return view('add');
    }
    public function view()
    {
        $user = Register::all();
        // fatching all the values from the database return to the table_veiw.blade.php page with the table data
        $data = compact('user');

        return view('table_view')->with($data);
    }

    public function delete($id)
    { // delete single row data
        $user = Register::find($id);
        $categories = User_age_catigeries::where('user_id', $id);

        if (!is_null($user)) {
            echo '<script>
        alert(""ansari avez")
        </script>';
            $user->delete();
            $categories->delete();
        }

        return redirect('/');
    }


    public function age()
    {
        $categioes = User_age_catigeries::all(); //the function retrive all the data from User_age_catigeries and tranfer the data to table_view_2

        $data = compact('categioes');

        return view('table_view_2')->with($data);
    }
    public function location()
    { //the function retrive the location of user table and count of age_catigiores of User_age_catigeries table
        //and join on registration_id from table 1 and user_id from table 2
        $users = DB::table('users')
            ->join('user_age_categories', 'users.registration_id', '=', 'user_age_categories.user_id')
            ->select(
                'users.location',
                DB::raw('COUNT(CASE WHEN user_age_categories.age_category = "Minor" THEN 1 END) AS minor_count'),
                DB::raw('COUNT(CASE WHEN user_age_categories.age_category = "Adult" THEN 1 END) AS adult_count'),
                DB::raw('COUNT(CASE WHEN user_age_categories.age_category = "Senior" THEN 1 END) AS senior_count')
            )
            ->groupBy('users.location')
            ->get();
        $data = compact('users');
        return view('table_view_3')->with($data);
    }


    public function deleteMultiple(Request $request) //this function delete the multiple row at the time by gettin the id in array format
    {
        $ids = $request->input('ids');

        $delete = Register::whereIn('registration_id', $ids)->delete();
        if ($delete) {
            return redirect('/');
        } else {
            return ('unscusses');
        }
    }
    public function multipleUpdate(Request $request) //this function update  the multiple row at the time by gettin the id in array format
    { //but in this function values also post in the array format
        $ids = $request->input('ids');
        $name = $request->input('input_0');
        $email = $request->input('input_1');
        $phone = $request->input('input_2');
        $location = $request->input('location');
        $date_of_birth = $request->input('input_4');
        $password = $request->input('input_5');

        DB::beginTransaction();

        try {
            // upadating the values(array format) from loom
            foreach ($ids as $index => $id) {

                $user = Register::where('registration_id', $id)->first();
                $categories = User_age_catigeries::where('user_id', $id)->first();

                $user->Name = $name[$index];
                $user->Email = $email[$index];
                $user->Phone = $phone[$index];
                $user->Location = $location[$index];
                $user->Date_Of_Birth = $date_of_birth[$index];
                $user->Password = $password[$index];
                $user->save();

                $categories->user_id = $user->registration_id;
                $age = date_diff(date_create($user->Date_Of_Birth), date_create('now'))->y;
                $categories->age = $age;
                if ($age <= 18) {
                    $categories->age_category = "MINOR";
                } elseif ($age > 18 && $age <= 60) {
                    $categories->age_category = "ADULT";
                } elseif ($age > 60) {
                    $categories->age_category = "SENIOR";
                }
                $categories->save();
            }

            DB::commit();

            return redirect('/'); //redirect to the default page
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/');
        }
    }

    public function excel()
    {

        $users = DB::table('users')->select('*')->get();

        $data = [];
        foreach ($users as $user) {
            $data[] = json_decode(json_encode($user), true);
        }
        // dd($data);


        $fileName = "billing_export_data-" . date('Ymd') . ".csv";


        header("Content-Type: text/csv");
        header("Content-Disposition: attachment; filename=\"$fileName\"");
        header("Expires: 0");
        // header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        // header("Cache-Control: private", false);


        $output = fopen('php://output', 'w');


        fputcsv($output, ['registration id', 'name', 'email', 'phone', 'location', 'date of birth', 'password', 'create at', 'update at', 'new weight', 'cod amount', 'new status', 'remark']);

        foreach ($data as $value) {
            fputcsv($output, $value);
        }
        fclose($output);
    }
    public function import(Request $request)
    {
        $user = Register::all();
        $file = $request->file('file');
        $columnLimit = 13;

        $handle = fopen($file, 'r');
        $firstRow = true;
        $row_number = 0;
        $errorRows = [];
        $execute = true;

        while (($row = fgetcsv($handle, 1000, ','))) {
            $row_number++;

            if ($firstRow) {
                $firstRow = false;
                continue;
            }

            $row = array_slice($row, 0, $columnLimit);

            if (in_array('', array_intersect_key($row, array_flip([0, 1, 2, 3, 4, 5, 6, 7, 9, 10])))) {
                $error_message = "Row $row_number contains empty cells. Please fill in all the cells and try again.";
                $errorRows[] = [
                    'row' => $row_number,
                    'message' => $error_message
                ];
                $execute = false;
            }

            if (!is_numeric($row[9]) && !empty($row[9])) {
                $error_message = "Row $row_number, column newweight contains a non-numeric value. Please provide a numeric value.";
                $errorRows[] = [
                    'row' => $row_number,
                    'message' => $error_message
                ];
                $execute = false;
            }

            if (!is_numeric($row[10]) && !empty($row[10])) {
                $error_message = "Row $row_number, column Cod amount contains a non-numeric value. Please provide a numeric value.";
                $errorRows[] = [
                    'row' => $row_number,
                    'message' => $error_message
                ];
                $execute = false;
            }
        }

        fclose($handle);

        if ($execute) {
            $handle = fopen($file, 'r');
            $firstRow = true;

            while (($row = fgetcsv($handle, 1000, ','))) {
                if ($firstRow) {
                    $firstRow = false;
                    continue;
                }

                $registrationId = $row[0];
                $users = Register::where('registration_id', $registrationId)->first();

                if ($users) {
                    $billing = Biling::where('registration_id', $registrationId)->first();

                    if ($billing) {
                        // Update existing entry
                        $billing->Name = $row[1];
                        $billing->Email = $row[2];
                        $billing->Phone = $row[3];
                        $billing->Location = $row[4];

                        if (!empty($row[5])) {
                            $dateOfBirth = Carbon::createFromFormat('d/m/Y', date('d/m/Y', strtotime($row[5])))->format('Y-m-d');
                            $billing->Date_Of_Birth = $dateOfBirth;
                        }

                        $billing->Password = $row[6];
                        $billing->New_weight = $row[9];
                        $new = $row[9] - $registrationId;
                        $billing->Weight_diff = $new;

                        if (!empty($row[10])) {
                            $billing->cod_ammount = $row[10];
                        }

                        $billing->New_status = $row[11];
                        $billing->Remark = $row[12];

                        $createdDate = Carbon::createFromFormat('d-m-Y H.i', $row[7])->format('Y-m-d H:i:s');
                        $billing->Created_at = $createdDate;
                        $billing->Updated_at = now();

                        $billing->save();
                    } else {
                        // Add new entry
                        $bill = new Biling;
                        $bill->registration_id = $registrationId;
                        $bill->Name = $row[1];
                        $bill->Email = $row[2];
                        $bill->Phone = $row[3];
                        $bill->Location = $row[4];

                        if (!empty($row[5])) {
                            $dateOfBirth = Carbon::createFromFormat('d/m/Y', date('d/m/Y', strtotime($row[5])))->format('Y-m-d');
                            $bill->Date_Of_Birth = $dateOfBirth;
                        }

                        $bill->Password = $row[6];
                        $bill->New_weight = $row[9];
                        $new = $row[9] - $registrationId;
                        $bill->Weight_diff = $new;

                        if (!empty($row[10])) {
                            $bill->cod_ammount = $row[10];
                        }

                        $bill->New_status = $row[11];
                        $bill->Remark = $row[12];

                        $createdDate = Carbon::createFromFormat('d-m-Y H.i', $row[7])->format('Y-m-d H:i:s');
                        $bill->Created_at = $createdDate;
                        $updatedDate = Carbon::createFromFormat('d-m-Y H.i', $row[8])->format('Y-m-d H:i:s');
                        $bill->Updated_at = $updatedDate;

                        $bill->save();
                    }
                } else {
                    Log::error("User not found for registration_id: $registrationId");
                }
            }

            fclose($handle);
        }

        if (!empty($errorRows)) {
            $error_message = 'The following rows contain errors:' . PHP_EOL;
            foreach ($errorRows as $errorRow) {
                $error_message .= "Row {$errorRow['row']}: {$errorRow['message']}" . PHP_EOL;
            }
            return redirect()->route('table')->with(['error_message' => $error_message, 'users' => $user]);
        } else {
            return redirect()->route('table');
        }
    }

    public function page_4()
    {
        $sheet = Biling::all();
        return view('table', compact('sheet'));
    }

    public function final_excel()
    {

        $users = DB::table('bilings')->select('*')->get();

        $data = [];
        foreach ($users as $user) {
            $data[] = json_decode(json_encode($user), true);
        }
        // dd($data);


        $fileName = "final_billing_export_data-" . date('Ymd') . ".csv";


        header("Content-Type: text/csv");
        header("Content-Disposition: attachment; filename=\"$fileName\"");
        header("Expires: 0");
        // header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        // header("Cache-Control: private", false);


        $output = fopen('php://output', 'w');


        fputcsv($output, ['id','registration id', 'name', 'email', 'phone', 'location', 'date of birth','password',  'new weight','weight diff',  'new status','cod amount', 'remark',  'create at','update at']);

        foreach ($data as $value) {
            fputcsv($output, $value);
        }
        fclose($output);
    }
public function page_5(){
    return view('table_2');
}
}
