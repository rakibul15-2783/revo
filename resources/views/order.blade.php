<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            margin-top: 100px;
            border-radius: 10px;
        }
        .card-body {
            padding: 40px;
        }
        .btn-order {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="row">
        <div class="col-xl-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="text-center">
                            <a href="{{ route('order') }}" class="btn btn-primary">Order Now</a>
                            <a href="{{ route('seeorder') }}" class="btn btn-success">See Orders</a>
                            <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                        </div><br><br><br>
                        <form action="{{ route('ordersuccess') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="date" class="col-sm-3 col-form-label">Date</label>
                                <div class="col-sm-9">
                                    <input type="date" name="date" value="{{ old('date') }}" required class="form-control" id="date" placeholder="Choose Date">
                                    @error('date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="item" class="col-sm-3 col-form-label">Item</label>
                                <div class="col-sm-9">
                                    <input type="text" name="item" value="{{ old('item') }}" required class="form-control" id="item" placeholder="Write your food name">
                                    @error('item')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" name="submit" onclick="return dayoff();" class="btn btn-info px-5 btn-order">Submit Order</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


 
<script>
	var date = new Date;
	var tDate = date.getDate();
	var month = date.getMonth() + 1;
	var currentHour = date.getHours();

	
  //do not make order in friday, saturday and sunday
    function dayoff() {
		var dateInput = document.getElementById("date");
		var selectedDate = new Date(dateInput.value);
		var selectedDay = selectedDate.getDay();
		//Sunday = 0, monday = 1 .....
        if (selectedDay === 5 || selectedDay === 6 || selectedDay === 0) {
            alert('You cannot order on Friday, Saturday, and Sunday.');
            return false;
        }

        else{
			return true;
		}

    }
	//can not todays order after 5.00 pm
    if(currentHour > 17){
			tDate = tDate + 2;
			if(tDate < 10){
				tDate = "0" + tDate;
			}
			if(month < 10){
				month = "0" + month;
			}

			var year = date.getUTCFullYear();
			var minDate = year + "-" + month + "-" + tDate;
			document.getElementById("date").setAttribute('min', minDate);
	}
	else{
		tDate = tDate + 1;
			if(tDate < 10){
				tDate = "0" + tDate;
			}
			if(month < 10){
				month = "0" + month;
			}
			var year = date.getUTCFullYear();
			var minDate = year + "-" + month + "-" + tDate;
			document.getElementById("date").setAttribute('min', minDate);
	}
	
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>