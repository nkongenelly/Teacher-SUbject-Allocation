@extends('layouts')
@section('content')
<div id="teacher">
    <a href="/allteachers" class="btn btn-sm btn-warning">View Teachers</a>
        <form class="form-horizontal" action="/teachers" method="POST" name="teacherForm">
            {{csrf_field()}}
        <div class="form-group">
            <label for="title">First Name</label>
            <input type="text" class="form-control" name="firstName" placeholder="Enter First Name" required>
            
        </div>
        <div class="form-group">
            <label for="title">Last Name</label>
            <input type="text" class="form-control" name="lastName" placeholder="Enter last Name" required>
            
        </div>
        <div class="form-group">
            <label for="title">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
            
        </div>
        <div class="form-group">
        <label for="title">Choose Category</label>
            <select name="subjectid">
            @foreach($subjects as $subject)
                <option value="{{$subject->subjectid}}">
                    {{$subject->name}}
                </option>
                @endforeach
            </select>
            
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
        <div id="allTeachers"></div>
        <script>
                var methods = ["GET", "POST"];
                var baseUrl = "http://127.0.0.1:8000/";

                //CREATE THE FORM 
                // Dynamic function for calling webservices
                function createObject(readyStateFunction,requestMethod,requestUrl, sendData = null){
                    
                    var obj = new XMLHttpRequest;
                
                    obj.onreadystatechange = function(){
                        if((this.readyState ==4) && (this.status ==200)){
                            readyStateFunction(this.responseText);
                        }
                        
                    };
                    obj.open(requestMethod, requestUrl, true);
                    if (requestMethod == 'POST'){
                        
                        obj.setRequestHeader("Content-type", "application/x-www-form-urlencoded" );
                        obj.setRequestHeader("X-CSRF-Token", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
                        obj.send(sendData);
                    }
                    else 
                    {
                        obj.send();
                    }
                    }
                    function submitTeacher(e){
                        //Get values submitted
                        e.preventDefault();
                        var firstName = document.forms["teacherForm"]["firstName"].value;
                        var lastName = document.forms["teacherForm"]["lastName"].value;
                        var email = document.forms["teacherForm"]["email"].value;
                        var subjectid = document.forms["teacherForm"]["subjectid"].value;
                        //alert(lessonName + lessonDescription);

                        //object to save lessons from form to db 
                        var sendData = "firstName="+firstName+"&lastName="+lastName+"&email="+email+"&subjectid="+
                        subjectid;
                        createObject(getTeachers, methods[1], baseUrl + "teachers", sendData);
                        
                    
                        //insert or send to server
                        //alert("working");
                        return false;
                    }
                    function getTeachers(){
                        document.getElementById("teacher").style.display = "block";
                        document.getElementById("allTeachers").style.display = "none";
                       
                        // alert('showpatients');
                        var responseObj = JSON.parse(jsonResponse);
                        var count = 0,tData;
                        var tableData = "<button class ='btn btn-primary' type = 'button' onclick = 'showPatientForm()'>New Patient Form</button><table class = 'table table-bordered table-striped table-condensed'><tr><th>#</th><th>Name</th><th>National ID</th><th>Date of Birth</th><th>Gender</th><th colspan ='4'> Action</th></tr>";
                        var gender1;
                        for (tData in responseObj)
                        {
                            
                            count++;
                            tableData +="<tr><td>" + count + "</td>";
                            tableData +="<td>" + responseObj[tData].firstName + "</td>";
                            tableData +="<td>" + responseObj[tData].lastName + "</td>";
                            tableData +="<td>" + responseObj[tData].email+ "</td>";
                                if(responseObj[tData].subjectid == "1"){
                                    tableData +="<td>" + "Maths" + "</td>";
                                }
                                else if(responseObj[tData].gender == "2")
                                {
                                    tableData +="<td>" + "English" + "</td>";
                                }
                                if(responseObj[tData].subjectid == "3"){
                                    tableData +="<td>" + "Kiswahili" + "</td>";
                                }
                                else if(responseObj[tData].gender == "4")
                                {
                                    tableData +="<td>" + "Computer Class" + "</td>";
                                }
                                else if(responseObj[tData].gender == "5")
                                {
                                    tableData +="<td>" + "Social Science" + "</td>";
                                }
                            //tableData +="<td>" + responseObj[tData].gender1 + "</td>";
                            // tableData +="<td><a href = '#' class ='btn btn-info bt-sm' onclick = 'submitVisitsForm("+responseObj[tData].patient_id+")'>New Visit</a></td>" ;
                            // tableData +="<td><a href = '#' class ='btn btn-info bt-sm' onclick = 'showSinglePatient("+responseObj[tData].patient_id+")'>View </a></td>" ;
                            // tableData +="<td><a href = '#' class ='btn btn-success btn-sm' onclick ='editPatient("+responseObj[tData].patient_id+",\""+responseObj[tData].full_name+"\",\"" +responseObj[tData].national_id+"\",\"" +responseObj[tData].gender+"\",\"" +responseObj[tData].date_of_birth +"\")'>Edit </a></td>" ;
                            // tableData +="<td><a href = '#' class ='btn btn-danger bt-sm' onclick = 'deletePatient("+responseObj[tData].patient_id+",\"" +responseObj[tData].name +"\")'>Delete </a></td></tr>" ;
                        }
                        tableData += "</table>";
                        document.getElementById("allTeachers").innerHTML = tableData;

                    
                    }
                    // document.getElementById("inputTeachers").addEventListener("submit", submitTeacher);
            </script>
@endsection