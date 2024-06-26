<?php
include_once './header.php';
include_once './controllers/index.php';

$form_config = $shift_manage_page_elements;
$admin_list = $admin->get_all_admin_users()['admin'];


if ($admin_list) {
    $selection1 = null;
    foreach ($admin_list as $item) {
        $selection1[] = array(
            'value' => $item['id'],    // Assuming 'id' is the key for the value in $cat
            'label' => $item['f6'],  // Assuming 'name' is the key for the label in $cat
        );
    }
    $form_config['inputs']['admins']['items'] = $selection1;
}


?>

<?php include_once './navbar.php'; ?>

<?php include_once './sidebar.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <?php
    $t1 = 'Log';
    $t2 = 'List';

    include_once './page_header.php';
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">

                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">

                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <a id="modal-btn" href="#" data-toggle="modal" data-target="#event-modal" class="btn btn-md btn-success btn-block waves-effect waves-light">
                                            <i class="fa fa-plus"></i> Create New
                                        </a>
                                    </div>

                                    <div class="col-md-9 col-sm-12 col-xs-12">



                                        <div class="input-group mb-3">

                                            <div class="col-sm-2">
                                                <select id="start-time-select" class="form-control">
                                                    <option value="00:00:00" selected>12 AM</option>
                                                    <option value="01:00:00">1 AM</option>
                                                    <option value="02:00:00">2 AM</option>
                                                    <option value="03:00:00">3 AM</option>
                                                    <option value="04:00:00">4 AM</option>
                                                    <option value="05:00:00">5 AM</option>
                                                    <option value="06:00:00">6 AM</option>
                                                    <option value="07:00:00">7 AM</option>
                                                    <option value="08:00:00">8 AM</option>
                                                    <option value="09:00:00">9 AM</option>
                                                    <option value="10:00:00">10 AM</option>
                                                    <option value="11:00:00">11 AM</option>
                                                    <option value="12:00:00">12 PM</option>
                                                    <option value="13:00:00">1 PM</option>
                                                    <option value="14:00:00">2 PM</option>
                                                    <option value="15:00:00">3 PM</option>
                                                    <option value="16:00:00">4 PM</option>
                                                    <option value="17:00:00">5 PM</option>
                                                    <option value="18:00:00">6 PM</option>
                                                    <option value="19:00:00">7 PM</option>
                                                    <option value="20:00:00">8 PM</option>
                                                    <option value="21:00:00">9 PM</option>
                                                    <option value="22:00:00">10 PM</option>
                                                    <option value="23:00:00">11 PM</option>
                                                </select>
                                            </div>

                                            <div class="input-group-prepend">
                                                <label class="input-group-text">To</label>
                                            </div>



                                            <div class="col-sm-2">
                                                <select id="end-time-select" class="form-control">
                                                    <option value="01:00:00">12 AM</option>
                                                    <option value="02:00:00">1 AM</option>
                                                    <option value="03:00:00">2 AM</option>
                                                    <option value="04:00:00">3 AM</option>
                                                    <option value="05:00:00">4 AM</option>
                                                    <option value="06:00:00">5 AM</option>
                                                    <option value="07:00:00">6 AM</option>
                                                    <option value="08:00:00">7 AM</option>
                                                    <option value="09:00:00">8 AM</option>
                                                    <option value="10:00:00">9 AM</option>
                                                    <option value="11:00:00">10 AM</option>
                                                    <option value="12:00:00">11 AM</option>
                                                    <option value="13:00:00">12 PM</option>
                                                    <option value="14:00:00">1 PM</option>
                                                    <option value="15:00:00">2 PM</option>
                                                    <option value="16:00:00">3 PM</option>
                                                    <option value="17:00:00">4 PM</option>
                                                    <option value="18:00:00">5 PM</option>
                                                    <option value="19:00:00">6 PM</option>
                                                    <option value="20:00:00">7 PM</option>
                                                    <option value="21:00:00">8 PM</option>
                                                    <option value="22:00:00">9 PM</option>
                                                    <option value="23:00:00">10 PM</option>
                                                    <option value="24:00:00" selected>11 PM</option>
                                                </select>
                                            </div>

                                            <div class="input-group-prepend">
                                                <button id="set-time-range" type="button" class="btn btn-default">Set Time Range</button>
                                            </div>
                                            <!-- /btn-group -->

                                        </div>

                                    </div>



                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div id="external-events" class="m-t-20">
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="card-box">
                                            <div id="calendar"></div>
                                        </div>
                                    </div> <!-- end col -->

                                </div> <!-- end row -->



                                <!-- END MODAL -->
                            </div>
                            <!-- end col-12 -->
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


                <div class="modal fade" id="event-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Events</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form action="<?= $form_config['form_action'] ?>" class="templatemo-login-form" method="post" enctype="multipart/form-data">

                                <div class="modal-body">


                                    <div class="row">
                                        <?php include_once '../inc/input_generate.php'; ?>
                                    </div>

                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button id="save-changes" type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->


</div>
<?php include_once './footer.php'; ?>


<script>
    $(function() {
        function ini_events(ele) {
            ele.each(function() {
                var eventObject = {
                    title: $.trim($(this).text())
                }
                $(this).data('eventObject', eventObject)
                $(this).draggable({
                    zIndex: 1070,
                    revert: true,
                    revertDuration: 0
                })
            })
        }

        ini_events($('#external-events div.external-event'))

        var Calendar = FullCalendar.Calendar;
        var Draggable = FullCalendar.Draggable;

        var containerEl = document.getElementById('external-events');
        var checkbox = document.getElementById('drop-remove');
        var calendarEl = document.getElementById('calendar');

        new Draggable(containerEl, {
            itemSelector: '.external-event',
            eventData: function(eventEl) {
                return {
                    title: eventEl.innerText,
                    backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                    borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                    textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color')
                };
            }
        });

        $.ajax({
            url: 'data/register_shift.php',
            method: 'POST',
            data: {
                action: 'get_all'
            },
            dataType: 'json',
            success: function(events) {
                var calendar = new Calendar(calendarEl, {
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    themeSystem: 'bootstrap',
                    initialView: 'timeGridWeek',
                    slotLabelFormat: [{
                        hour: '2-digit',
                        minute: '2-digit',
                        hour12: true
                    }],                  
                    events: events,
                    editable: true,
                    droppable: false,
                    selectable: true,
                    select: function(info) {
                        clearModalInputs();
                        var start = moment(info.start).format('YYYY-MM-DDTHH:mm:ss');
                        var end = moment(info.end).format('YYYY-MM-DDTHH:mm:ss');

                        $('#f2').val(start);
                        $('#f3').val(end);
                        $('#f4').prop('checked', info.allDay);
                        $('#modal-btn').click();
                    },

                    dateClick: function(info) {
                        var view = calendar.view.type;
                        clearModalInputs();

                        if (view === 'dayGridMonth') {
                            $('#f2').val(info.dateStr + 'T00:00'); // Default to start of the day
                            $('#f3').val('');
                        }
                        $('#f4').prop('checked', info.allDay);
                        $('#id').val('');
                        //$('#event-modal').modal('show');
                        $('#modal-btn').click();
                    },
                    eventClick: function(info) {
                      
                        $.ajax({
                            url: 'data/register_shift.php',
                            method: 'POST',
                            data: {
                                id: info.event.id,
                                action: 'get_event'
                            },
                            success: function(data) {
                              
                                $('#id').val(data.id);
                                $('#shift_plans').val(data.shift_plans);
                                $('#f1').val(data.title);
                                $('#f2').val(data.start);
                                $('#f3').val(data.end ? data.end : '');
                                $('#f5').val(data.description);

                            
                                // Array of admin IDs to pre-select in Select2
                                var adminsToSelect = data.admins;

                                // Clear and reinitialize Select2 for users select box
                                $('#admins').val(null).trigger('change'); // Clear current selections
                                $('#admins').val(adminsToSelect).trigger('change'); // Set new selection
                                $('#modal-btn').click();
                            }
                        });
                    }
                });
                calendar.render();


                $('#set-time-range').click(function() {
                    var startTime = $('#start-time-select').val();
                    var endTime = $('#end-time-select').val();


                    calendar.setOption('slotMinTime', startTime);
                    calendar.setOption('slotMaxTime', endTime);
                });


            }

        });


        function clearModalInputs() {
            $('#id').val('');
            $('#f1').val('');
            5
            $('#f5').val('');
            $('#f4').prop('checked', false); // Assuming f4 is a checkbox          
            $('#admins').val(null).trigger('change');
        }
        $('#color-chooser > li > a').click(function(e) {
            e.preventDefault()
            currColor = $(this).css('color')
            $('#add-new-event').css({
                'background-color': currColor,
                'border-color': currColor
            })
        });

        $('#add-new-event').click(function(e) {
            e.preventDefault()
            var val = $('#new-event').val()
            if (val.length == 0) {
                return
            }
            var event = $('<div />')
            event.css({
                'background-color': currColor,
                'border-color': currColor,
                'color': '#fff'
            }).addClass('external-event')
            event.text(val)
            $('#external-events').prepend(event)
            ini_events(event)
            $('#new-event').val('')
        });
    });

    $(document).ready(function() {
        $('.modal-class').select2({
            dropdownParent: $('#event-modal')
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Initialize Select2 with dropdownParent option
        $('.modal-class').select2({
            dropdownParent: $('#event-modal')
        });
    });
</script>


<script>
    $(document).ready(function() {
        // Initialize Select2 with dropdownParent option
        $('.modal-class').select2({
            dropdownParent: $('#event-modal')
        });
    });
</script>


</body>

</html>