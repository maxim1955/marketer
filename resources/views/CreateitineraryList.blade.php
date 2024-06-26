<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>METROLOG</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ 'assets/vendors/feather/feather.css' }}">
    <link rel="stylesheet" href="{{ 'assets/vendors/ti-icons/css/themify-icons.css' }}">
    <link rel="stylesheet" href="{{ 'assets/vendors/css/vendor.bundle.base.css' }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- <link rel="stylesheet" href="{{ 'assets/vendors/select2/select2.min.css' }}">
<link rel="stylesheet" href="{{ 'assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css' }}"> -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <!-- JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ 'assets/css/vertical-layout-light/style.css' }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ 'assets/images/favicon.png' }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        html {
            box-sizing: border-box;
            font-size: 75%;
        }

        *,
        *::before,
        *::after {
            box-sizing: inherit;
        }

        body {
            font-family: "Open Sans", sans-serif;
            padding: 1em;
        }

        p {
            margin-top: 0;
        }

        h1 {
            font-weight: 700;
            margin-top: 0;
        }

        h2 {
            font-weight: 700;
            margin-top: 0;
        }

        h3 {
            font-weight: 700;
            margin-top: 0;
        }

        h4 {
            font-weight: 700;
            margin-top: 0;
        }

        h5 {
            font-weight: 700;
            margin-top: 0;
        }

        h6 {
            font-weight: 700;
            margin-top: 0;
        }


        .form-select {
            border: 0 !important;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: url(http://www.htmllion.com/img/demo/select-arrow.png) no-repeat 90% center;
            width: 200px;
            text-indent: 0.01px;
            text-overflow: "";
            color: gray;
            padding: 5px;
            border: 1px solid gray !important;
        }

        .input-style {
            border: 0 !important;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: url(http://www.htmllion.com/img/demo/select-arrow.png) no-repeat 90% center;
            width: 200px;
            text-indent: 0.01px;
            text-overflow: "";
            color: gray;
            padding: 5px;
            border: 1px solid gray !important;
        }

        .hidden {
            display: none !important;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown">
                        @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
                            {{ __('Выход') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <div class="theme-setting-wrapper">
            </div>
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Главная</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Заявки</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ route('create.index') }}">Новая
                                        Заявка</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('metrlog.index') }}">Мои
                                        Заявки</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Устройства</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="form-elements">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('devices.index') }}">Девайсы</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                            <i class="icon-bar-graph menu-icon"></i>
                            <span class="menu-title">Графики Работ</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="charts">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ route('operatorshedule.index') }}">График Операторов</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('LogisticSettings.index') }}">График Логистов</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('metrologShowShedule.index') }}">График Метрологов</a></li>
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                            <i class="icon-grid-2 menu-icon"></i>
                            <span class="menu-title">Инфо. Адреса</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ route('applicationsandaddresses.index') }}">Заявки и Адреса</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('addresses.index') }}">Адреса</a></li>
                            </ul>
                        </div>
                    </li>





                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                            <i class="icon-head menu-icon"></i>
                            <span class="menu-title">Админка</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="auth">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ route('userrequisitessettings.index') }}"> Реквезиты </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('statustransitionsController.index') }}"> Статусы </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('logisticshedule.index') }}">
                                        Наст. График Логист </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('OperatorSettings.index') }}">
                                        Наст. График Оператор </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('MetrologShedule.index') }}">
                                        Наст. График Метролгов </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('addRoleToUser.index') }}">
                                        Установка роли пользователю </a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>




            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Маршрутный лист (№<span id="routeSheetNumber"></span>) от
                                        <span id="currentDateTime"></span>
                                    </h4>
                                    <form>
                                        <div class="form-group row">
                                            <label for="authorSelect" class="col-sm-3 col-form-label"><strong>Автор:</strong></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-select input-style" id="authorInput" value="{{ auth()->user()->name }}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="organizationSelect" class="col-sm-3 col-form-label"><strong>Организация:</strong></label>
                                            <div class="col-sm-9">
                                                <select class="form-select" id="organizationSelect">
                                                    <option value="" selected>Показать все</option>
                                                    @foreach($organization as $organizations)
                                                    <option value="{{ $organizations->name }}">{{ $organizations->name
                                                        }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="timeinput" class="col-sm-3 col-form-label"><strong>Кол-во
                                                    времени:</strong></label>
                                            <div class="col-sm-9">
                                                <input class="form-select input-style" id="timeinput" placeholder="Введите время формата Ч:М:C" value="" readonly>
                                            </div>
                                        </div>


                                        <!-- Горизонтальные кнопки -->
                                        <div class="form-group row" style="margin-top: 10px;">
                                            <div class="col-sm-6">
                                                <button type="button" class="btn btn-primary" id="fillButton">Заполнить</button>

                                                <button type="button" id="addButton" class="btn btn-success">Добавить</button>

                                                <button type="button" id="createRouteSheetButton" class="btn btn-success">Создать маршрутный лист</button>


                                            </div>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>


                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="statusSelect" class="col-sm-3 col-form-label"><strong>Статус
                                                Заявок:</strong></label>
                                        <div class="col-sm-9">
                                            <select class="form-select" id="statusSelect">
                                                <option value="" selected>Показать все</option>
                                                @foreach($status as $statuses)
                                                <option value="{{ $statuses->id }}">{{ $statuses->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>




                                    <div class="form-group row">
                                        <label for="dateForApplication" class="col-sm-3 col-form-label" required>Дата
                                            выполнения</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="dateForApplication" class="form-select input-style" id="dateForApplication" required>
                                        </div>
                                    </div>






                                    <div class="form-group row">
                                        <label for="metrolog" class="col-sm-3 col-form-label"><strong>Метролог:</strong></label>
                                        <div class="col-sm-9">
                                            <select class="form-select" id="metrolog" required>
                                                <option value="" selected>Показать все</option>
                                                @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Округа</h4>
                                    <table class="table table-bordered" id="regionsTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Регион</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($region as $index => $regionItem)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $regionItem->name }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>




                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="dop" role="tabpanel" aria-labelledby="dopTab" data-category="additionalWork">
                                            <div style="max-height: 400px; overflow-y: auto;">
                                                <div class="table-responsive pt-3">
                                                    <table class="table table-bordered" id="applicationsTable">
                                                        <thead>
                                                            <tr>
                                                                <th>№</th>
                                                                <th>Заявка наряд</th>
                                                                <th>Статус</th>
                                                                <th>Услуги</th>
                                                                <th>Метролог</th>
                                                                <th>Интервал</th>
                                                                <th>Дата выхода</th>
                                                                <th>Адрес</th>
                                                                <th>Комментарий логисту</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>


                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>





                                            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

                                            <script>
                                                // Initialize DataTables with a page length of 3 (showing only 3 rows)
                                                $(document).ready(function() {
                                                    $('#regionsTable').DataTable({
                                                        "paging": true, // Enable or disable pagination
                                                        "pageLength": 3, // Set the number of rows per page
                                                    });
                                                });
                                            </script>


                                            <!-- Добавленный код: скрипт для поиска по ID -->
                                            <script>
                                                $(document).ready(function() {
                                                    function addDropdownList(selector, data) {
                                                        var existingDropdown = $(selector).next('.form-control');

                                                        if (existingDropdown.length) {
                                                            existingDropdown.empty().append('<option value=""></option>');
                                                            for (var i = 0; i < data.length; i++) {
                                                                existingDropdown.append('<option value="' + data[i].id + '" data-time="' + data[i].timeForApplication + '">' + data[i].id + '</option>');
                                                            }
                                                        } else {
                                                            $(selector).next('select').remove();

                                                            var dropdownList = $('<select class="form-control"></select>').append('<option value=""></option>');

                                                            for (var i = 0; i < data.length; i++) {
                                                                dropdownList.append('<option value="' + data[i].id + '" data-time="' + data[i].timeForApplication + '">' + data[i].id + '</option>');
                                                            }

                                                            dropdownList.insertAfter(selector);

                                                            dropdownList.on("change", function() {
                                                                var selectedValue = $(this).val();
                                                                var selectedOption = $(this).find('option:selected');
                                                                var timeForApplication = selectedOption.data('time');

                                                                if (selectedValue !== "") {
                                                                    setTimeInputValue(timeForApplication);
                                                                    $(selector).text(selectedValue).trigger("change");
                                                                }
                                                                dropdownList.remove();
                                                            });
                                                        }
                                                    }

                                                    function handleIdInputChange() {
                                                        var inputValue = $(this).text().trim();
                                                        console.log('Input Value:', inputValue);

                                                        if (inputValue !== '') {
                                                            var row = $(this).closest('tr');
                                                            fetchDataForIdAndPopulateFields(inputValue, row);
                                                        } else {
                                                            // Если поле ID пусто, очищаем соответствующие ячейки
                                                            clearFields(row);
                                                        }
                                                    }

                                                    function fetchDataForIdAndPopulateFields(inputValue, row) {
                                                        console.log('Fetching data for ID:', inputValue);
                                                        return $.ajax({
                                                            url: 'http://case.sknewlife.ru/getApplicationById/' + inputValue,
                                                            type: 'GET',
                                                            dataType: 'json'
                                                        }).done(function(response) {
                                                            console.log('AJAX Response:', response);
                                                            if (response.success) {
                                                                if (row && row.find) {
                                                                    row.find('.for-status, .for-job, .for-interval, .for-planeDate, .for-address, .for-logistCommentary, .for-time', ).text('');

                                                                    addDropdownList(row.find('.for-id'), response.data);

                                                                    row.find('.for-status').text(response.data[0].status_name);

                                                                    var productsInfoText = response.data[0].productsInfo ? response.data[0].productsInfo.join(', ') : '';
                                                                    row.find('.for-job').text(productsInfoText);

                                                                    row.find('.for-interval').text(response.data[0].selectedPeriod);
                                                                    row.find('.for-planeDate').text(response.data[0].dateForApplication);
                                                                    row.find('.for-address').text(response.data[0].address);
                                                                    row.find('.for-logistCommentary').text(response.data[0].logistic_commentary);
                                                                    row.find('.for-time').text(response.data[0].timeForApplication);

                                                                    // row.find('.for-time').text(response.data[0].totalTimesInput);



                                                                }
                                                            }
                                                        }).fail(function() {
                                                            console.error('AJAX Error');
                                                        });
                                                    }

                                                    function clearFields(row) {
                                                        // Очищаем соответствующие ячейки
                                                        row.find('.for-id + select').remove();
                                                        row.find('.for-status, .for-job, .for-interval, .for-planeDate, .for-address, .for-logistCommentary').text('');

                                                        // Очищаем также поле времени
                                                        setTimeInputValue('', row);
                                                    }

                                                    function setTimeInputValue(value) {
                                                        var timeInputField = $('#timeinput');


                                                        // Проверьте, не является ли значение пустым
                                                        if (value !== undefined) {
                                                            // Получите текущее значение поля
                                                            var currentValue = timeInputField.val();

                                                            // Проверьте, не является ли текущее значение пустым
                                                            if (currentValue !== undefined && currentValue !== '') {
                                                                // Сложите текущее значение и новое значение времени
                                                                var newValue = addTime(currentValue, value);
                                                                // Установите новое значение в поле
                                                                timeInputField.val(newValue);
                                                                console.log('Updated value:', timeInputField.val());
                                                            } else {
                                                                // Если текущее значение пусто, установите новое значение в поле
                                                                timeInputField.val(value);
                                                                console.log('Updated value:', timeInputField.val());
                                                            }
                                                        } else {
                                                            console.error('Value is undefined or empty.');
                                                        }
                                                    }


                                                    function addTime(time1, time2) {
                                                        // Разбейте время на часы, минуты и секунды
                                                        var [hours1, minutes1, seconds1] = time1.split(':').map(Number);
                                                        var [hours2, minutes2, seconds2] = time2.split(':').map(Number);

                                                        // Сложите значения часов, минут и секунд
                                                        var sumHours = hours1 + hours2;
                                                        var sumMinutes = minutes1 + minutes2;
                                                        var sumSeconds = seconds1 + seconds2;

                                                        // Проверьте и скорректируйте переполнения
                                                        if (sumSeconds >= 60) {
                                                            sumSeconds -= 60;
                                                            sumMinutes++;
                                                        }
                                                        if (sumMinutes >= 60) {
                                                            sumMinutes -= 60;
                                                            sumHours++;
                                                        }

                                                        // Форматируйте результат обратно в строку
                                                        var result = padZero(sumHours) + ':' + padZero(sumMinutes) + ':' + padZero(sumSeconds);
                                                        return result;
                                                    }





                                                    $(document).on("click", ".removeRowButton", function() {
                                                        // Находим родительскую строку (tr) и удаляем её
                                                        var row = $(this).closest('tr');
                                                        removeRow(row);
                                                    });


                                                    function addRow() {
                                                        var newRow = $("<tr>");
                                                        var rowCount = $('#applicationsTable tbody tr').length + 1;
                                                        newRow.append('<td>' + rowCount + '</td>');

                                                        var cellClasses = ['for-id', 'for-status', 'for-job', 'for-metrolog', 'for-interval', 'for-planeDate', 'for-address', 'for-logistCommentary'];

                                                        for (var i = 0; i < cellClasses.length; i++) {
                                                            newRow.append('<td contenteditable="true" class="' + cellClasses[i] + '"></td>');

                                                            if (i === 0) {
                                                                newRow.find('.for-id').on("input", handleIdInputChange);
                                                            }
                                                        }

                                                        // Добавление скрытого поля для времени
                                                        newRow.append('<td class="for-time" style="display: none;"></td>');

                                                        // Добавление кнопки "Убрать из листа"
                                                        var removeButton = $('<td><button class="btn btn-danger removeRowButton">Убрать из листа</button></td>');
                                                        removeButton.on("click", function() {
                                                            removeRow(newRow);
                                                        });

                                                        newRow.append(removeButton);

                                                        $("#applicationsTable tbody").append(newRow);
                                                        console.log('Новая строка добавлена. Всего строк:', rowCount);
                                                    }



                                                    function removeRow(row) {
                                                        // Получаем время для удаляемой строки
                                                        var timeForRemovedRow = row.find('.for-time').text();
                                                        console.log(timeForRemovedRow);

                                                        // Очищаем соответствующее поле времени только для удаляемой строки
                                                        var timeInputField = $('#timeinput');
                                                        var timeValue = timeInputField.val();
                                                        if (timeValue !== undefined && timeValue !== '') {
                                                            // Вычитаем время удаляемой строки из общего времени
                                                            var newValue = subtractTime(timeValue, timeForRemovedRow);
                                                            timeInputField.val(newValue);
                                                            console.log('Время убрано для строки. Новое значение времени:', newValue);
                                                        }


                                                        row.remove();
                                                    }

                                                    function subtractTime(time1, time2) {
                                                        var datetime1 = new Date('1970-01-01T' + time1 + 'Z');
                                                        var datetime2 = new Date('1970-01-01T' + time2 + 'Z');

                                                        var result = new Date(datetime1 - datetime2);

                                                        // Получаем часы, минуты и секунды из результата
                                                        var hours = result.getUTCHours();
                                                        var minutes = result.getUTCMinutes();
                                                        var seconds = result.getUTCSeconds();

                                                        // Форматируем результат
                                                        var formattedResult = formatTime(hours, minutes, seconds);

                                                        return formattedResult;
                                                    }

                                                    function formatTime(hours, minutes, seconds) {
                                                        // Добавляем нули перед числами < 10
                                                        var formattedHours = ('0' + hours).slice(-2);
                                                        var formattedMinutes = ('0' + minutes).slice(-2);
                                                        var formattedSeconds = ('0' + seconds).slice(-2);

                                                        return formattedHours + ':' + formattedMinutes + ':' + formattedSeconds;
                                                    }


                                                    function convertTimeToMinutes(time) {
                                                        var parts = time.split(':');
                                                        return parseInt(parts[0], 10) * 60 + parseInt(parts[1], 10);
                                                    }

                                                    function convertMinutesToTime(minutes) {
                                                        var hours = Math.floor(minutes / 60);
                                                        var remainingMinutes = minutes % 60;
                                                        return padZero(hours) + ':' + padZero(remainingMinutes);
                                                    }

                                                    function padZero(value) {
                                                        return value < 10 ? '0' + value : '' + value;
                                                    }





                                                    $("#addButton").on("click", function() {
                                                        addRow();
                                                    });
                                                });
                                            </script>



                                            <script>
                                                // Переменные для хранения выбранной организации, даты и статуса
                                                var selectedOrganization = "";
                                                var selectedDate = "";
                                                var selectedStatus = "";

                                                // Функция для преобразования даты в нужный формат
                                                function formatDateForFilter(date) {
                                                    const parts = date.split('-');
                                                    return parts[2] + '.' + parts[1] + '.' + parts[0];
                                                }

                                                $("#applicationsTable").on("click", ".removeRowButton", function() {
                                                    // Находим родительскую строку (tr) и удаляем её
                                                    $(this).closest('tr').remove();
                                                });


                                                // Функция для добавления строк в таблицу
                                                function addRows(application) {
                                                    var newRow = $("<tr>");
                                                    var rowCount = $('#applicationsTable tbody tr').length + 1;

                                                    // Проверяем, соответствует ли организация выбранной организации в фильтре
                                                    var organizationFilterPassed = selectedOrganization === "" || application.organization === selectedOrganization;

                                                    // Проверяем, соответствует ли дата выбранной дате в фильтре
                                                    var dateFilterPassed = selectedDate === "" || formatDateForFilter(application.dateForApplication) === selectedDate;

                                                    // Проверяем, соответствует ли статус выбранному статусу в фильтре
                                                    var statusFilterPassed = selectedStatus === "" || application.status.id == selectedStatus;

                                                    // Если все фильтры прошли, добавляем строку
                                                    if (organizationFilterPassed && dateFilterPassed && statusFilterPassed) {
                                                        newRow.append('<td>' + rowCount + '</td>');
                                                        newRow.append('<td>' + application.id + '</td>');
                                                        newRow.append('<td>' + application.status.name + '</td>');

                                                        if (typeof application.productsInfo === 'string') {
                                                            var productsInfoObject = JSON.parse(application.productsInfo);
                                                            var keysString = Object.keys(productsInfoObject).join(', ');
                                                            newRow.append('<td>' + keysString + '</td>');
                                                        } else {
                                                            newRow.append('<td></td>');
                                                        }

                                                        newRow.append('<td></td>');
                                                        newRow.append('<td>' + application.selectedPeriod + '</td>');
                                                        newRow.append('<td>' + application.dateForApplication + '</td>');
                                                        newRow.append('<td>' + application.addresses[0].full_address + '</td>');
                                                        newRow.append('<td>' + application.commentary.logistic_commentary + '</td>');
                                                        newRow.append('<td class="for-time" style="display: none;">' + application.totalTimesInput + '</td>');

                                                        var timeInputField = $('#timeinput');
                                                        var timeValue = timeInputField.val();
                                                        if (timeValue !== undefined && timeValue !== '') {
                                                            // Сложим время заявки с общим временем
                                                            var newValue = addTime(timeValue, application.totalTimesInput);
                                                            timeInputField.val(newValue);
                                                            console.log('Время добавлено для строки. Новое значение времени:', newValue);
                                                        } else {
                                                            // Если поле времени пусто, установим значение из заявки
                                                            timeInputField.val(application.totalTimesInput);
                                                            console.log('Время добавлено для строки. Новое значение времени:', application.totalTimesInput);
                                                        }

                                                        // Добавляем кнопку "убрать из листа"
                                                        newRow.append('<td><button class="btn btn-danger removeRowButton">Убрать из листа</button></td>');

                                                        $("#applicationsTable tbody").append(newRow);
                                                        console.log('Новая строка добавлена. Всего строк:', rowCount);
                                                    }
                                                }

                                                // Обработчик события клика по кнопке fillButton
                                                $("#fillButton").on("click", function() {
                                                    // Обновляем значение переменной selectedOrganization при изменении выбора в фильтре
                                                    selectedOrganization = $("#organizationSelect").val();

                                                    // Обновляем значение переменной selectedDate при изменении выбора в фильтре даты
                                                    selectedDate = $("#dateForApplication").val() ? formatDateForFilter($("#dateForApplication").val()) : "";

                                                    // Обновляем значение переменной selectedStatus при изменении выбора в фильтре статуса
                                                    selectedStatus = $("#statusSelect").val();

                                                    // Очищаем таблицу перед загрузкой новых данных
                                                    $("#applicationsTable tbody").empty();

                                                    // Вызываем снова запрос данных и обработку
                                                    $.ajax({
                                                        url: 'http://case.sknewlife.ru/getAllApplicationsWithFilters/',
                                                        type: 'GET',
                                                        dataType: 'json',
                                                        success: function(response) {
                                                            if (response.success) {
                                                                // Переберите данные и выполните действия для каждой записи
                                                                response.data.forEach(function(application) {
                                                                    // Теперь вызываем функцию добавления строк
                                                                    addRows(application);
                                                                });
                                                            } else {
                                                                console.error('Ошибка при получении данных');
                                                            }
                                                        },
                                                        error: function() {
                                                            console.error('AJAX Error');
                                                        }
                                                    });
                                                });

                                                // Обработчик события изменения выбранной организации в фильтре
                                                $("#organizationSelect").on("change", function() {
                                                    // Обновляем значение переменной selectedOrganization при изменении выбора в фильтре
                                                    selectedOrganization = $(this).val();
                                                });

                                                // Обработчик события изменения выбранной даты в фильтре
                                                $("#dateForApplication").on("change", function() {
                                                    // Обновляем значение переменной selectedDate при изменении выбора в фильтре даты
                                                    selectedDate = $(this).val() ? formatDateForFilter($(this).val()) : "";
                                                });

                                                // Обработчик события изменения выбранного статуса в фильтре
                                                $("#statusSelect").on("change", function() {
                                                    // Обновляем значение переменной selectedStatus при изменении выбора в фильтре статуса
                                                    selectedStatus = $(this).val();
                                                });

                                                function addTime(time1, time2) {
                                                    // Разбейте время на часы, минуты и секунды
                                                    var [hours1, minutes1, seconds1] = time1.split(':').map(Number);
                                                    var [hours2, minutes2, seconds2] = time2.split(':').map(Number);

                                                    // Сложите значения часов, минут и секунд
                                                    var sumHours = hours1 + hours2;
                                                    var sumMinutes = minutes1 + minutes2;
                                                    var sumSeconds = seconds1 + seconds2;

                                                    // Проверьте и скорректируйте переполнения
                                                    if (sumSeconds >= 60) {
                                                        sumSeconds -= 60;
                                                        sumMinutes++;
                                                    }
                                                    if (sumMinutes >= 60) {
                                                        sumMinutes -= 60;
                                                        sumHours++;
                                                    }



                                                    // Форматируйте результат обратно в строку
                                                    var result = padZero(sumHours) + ':' + padZero(sumMinutes) + ':' + padZero(sumSeconds);
                                                    return result;
                                                }

                                                function padZero(value) {
                                                    return value < 10 ? '0' + value : '' + value;
                                                }


                                                function subtractTime(time1, time2) {
                                                    var datetime1 = new Date('1970-01-01T' + time1 + 'Z');
                                                    var datetime2 = new Date('1970-01-01T' + time2 + 'Z');

                                                    var result = new Date(datetime1 - datetime2);

                                                    // Получаем часы, минуты и секунды из результата
                                                    var hours = result.getUTCHours();
                                                    var minutes = result.getUTCMinutes();
                                                    var seconds = result.getUTCSeconds();

                                                    // Форматируем результат
                                                    var formattedResult = formatTime(hours, minutes, seconds);

                                                    return formattedResult;
                                                }

                                                function formatTime(hours, minutes, seconds) {
                                                    // Добавляем нули перед числами < 10
                                                    var formattedHours = ('0' + hours).slice(-2);
                                                    var formattedMinutes = ('0' + minutes).slice(-2);
                                                    var formattedSeconds = ('0' + seconds).slice(-2);

                                                    return formattedHours + ':' + formattedMinutes + ':' + formattedSeconds;
                                                }




                                                function updateTotalTime() {
                                                    var totalTime = 0;

                                                    $('#applicationsTable tbody tr').each(function() {
                                                        var timeString = $(this).find('.for-time').text();
                                                        totalTime = addTime(totalTime, timeString);
                                                    });

                                                    $('#timeinput').val(totalTime);
                                                }

                                                function removeRow(row) {
                                                    // Получаем время для удаляемой строки
                                                    var timeForRemovedRow = row.find('.for-time').text();


                                                    // Очищаем соответствующее поле времени только для удаляемой строки
                                                    var timeInputField = $('#timeinput');
                                                    var timeValue = timeInputField.val();
                                                    if (timeValue !== undefined && timeValue !== '') {
                                                        // Вычитаем время удаляемой строки из общего времени
                                                        var newValue = subtractTime(timeValue, timeForRemovedRow);
                                                        console.log("Новое значение времени:", newValue);
                                                        timeInputField.val(newValue);
                                                        console.log('Время убрано для строки. Новое значение времени:', newValue);
                                                    }

                                                    row.remove();
                                                }
                                            </script>



                                            <script>
                                                // Ограничение на формат времени
                                                $('#timeinput').on('input', function() {
                                                    var inputValue = $(this).val();
                                                    if (!/^\d{1,2}:\d{1,2}:\d{1,2}$/.test(inputValue)) {
                                                        // Очистить поле, если формат не соответствует Ч:М:C
                                                        $(this).val('');
                                                    }
                                                });
                                            </script>



                                            <script>
                                                // Дождемся полной загрузки страницы
                                                document.addEventListener("DOMContentLoaded", function() {
                                                    // Получаем текущую дату и время
                                                    var currentDate = new Date();
                                                    var formattedDate = currentDate.toLocaleString();

                                                    // Вставляем текущую дату и время в соответствующие элементы
                                                    document.getElementById("currentDateTime").innerText = formattedDate;

                                                    // Генерируем случайный номер маршрутного листа (можете изменить логику генерации)
                                                    var routeSheetNumber = Math.floor(Math.random() * 1000) + 1; // пример генерации от 1 до 1000

                                                    // Вставляем номер маршрутного листа в соответствующий элемент
                                                    document.getElementById("routeSheetNumber").innerText = routeSheetNumber;
                                                });
                                            </script>





                                            <script>
                                                $("#createRouteSheetButton").on("click", function() {
                                                    // Получаем номер маршрутного листа и текущую дату/время из DOM
                                                    var csrfToken = '{{ csrf_token() }}'; // Получаем CSRF-токен для запросов
                                                    var routeSheetNumber = $("#routeSheetNumber").text().trim();
                                                    var currentDateTime = $("#currentDateTime").text().trim();

                                                    // Собираем данные из формы
                                                    var authorName = $("#authorInput").text();
                                                    var organizationName = $("#organizationSelect option:selected").text();
                                                    var timeInput = $("#timeinput").val();
                                                    var dateForApplication = $("#dateForApplication").val();
                                                    var metrologName = $("#metrolog option:selected").text();
                                                    var statusName = $("#statusSelect option:selected").text();

                                                    // Собираем данные из таблицы с заявками
                                                    var routeSheetData = [];
                                                    $("#applicationsTable tbody tr").each(function() {
                                                        var rowData = {
                                                            requestId: $(this).find('.for-id').text(),
                                                            // Другие данные заявки
                                                        };
                                                        routeSheetData.push(rowData);
                                                    });

                                                    // Отправляем данные на сервер
                                                    $.ajax({
                                                        url: '/create-route-sheet',
                                                        type: 'POST',
                                                        contentType: 'application/json',
                                                        headers: {
                                                            'X-CSRF-TOKEN': csrfToken,
                                                        },
                                                        data: JSON.stringify({
                                                            routeSheetNumber: routeSheetNumber,
                                                            currentDateTime: currentDateTime,
                                                            routeSheetData: routeSheetData,
                                                            authorName: authorName,
                                                            organizationName: organizationName,
                                                            timeInput: timeInput,
                                                            dateForApplication: dateForApplication,
                                                            metrologName: metrologName,
                                                            statusName: statusName
                                                        }),
                                                        success: function(response) {
                                                            console.log('Маршрутный лист создан успешно:', response);
                                                            $("#applicationsTable tbody").empty();
                                                            $("#organizationSelect").val('');
                                                            $("#dateForApplication").val('');
                                                            $("#statusSelect").val('');
                                                            $("#metrolog").val('');
                                                            $("#timeinput").val('');


                                                        },
                                                        error: function(error) {
                                                            console.error('Ошибка при создании маршрутного листа:', error);
                                                        }
                                                    });
                                                });
                                            </script>

                                            <script>
                                                $(document).ready(function() {
                                                    // Обрабатываем клик на чекбоксе
                                                    $('#changeMetrologCheckbox').on('click', function() {
                                                        // Ваш код обработки события
                                                    });
                                                });
                                            </script>


                                            <table id="sortableTable">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">№</th>
                                                        <th scope="col">Выб</th>
                                                        <th scope="col">Номер</th>
                                                        <th scope="col">Регламент</th>
                                                        <th scope="col">Интервал</th>
                                                        <th scope="col">Адрес</th>
                                                        <th scope="col">Комментарий логисту</th>
                                                    </tr>
                                                </thead>

                                                <tbody class="sortable ui-sortable">


                                            </table>


                            
                                            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js"></script>
                                            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
                                            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
                                            <script src="https://cdn.jsdelivr.net/npm/air-datepicker@2.2.3/dist/js/datepicker.min.js"></script>
                                            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

                                            <script src="{{ 'assets/vendors/typeahead.js/typeahead.bundle.min.js' }} "></script>
                                            <script src="{{ 'assets/vendors/select2/select2.min.js' }} "></script>
                                            <script src="{{ 'assets/js/off-canvas.js' }} "></script>
                                            <script src="{{ 'assets/js/hoverable-collapse.js' }} "></script>
                                            <script src="{{ 'assets/js/template.js' }} "></script>
                                            <script src="{{ 'assets/js/settings.js' }} "></script>
                                            <script src="{{ 'assets/js/todolist.js' }} "></script>
                                            <script src="{{ 'assets/js/file-upload.js' }} "></script>
                                            <script src="{{ 'assets/js/typeahead.js' }} "></script>
                                            <script src="{{ 'assets/js/select2.js' }} "></script>