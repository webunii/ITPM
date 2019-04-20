<div id="add" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <form method="post" class="form-horizontal" role="form" name="myForm">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add a new Course</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="c_code">Course Code: </label>
                      <div class="col-sm-3">
                          <input type="text" class="form-control" id="c_code" name="c_code" placeholder="ITXXXX/itXXXX" autocomplete="off" onblur="validate()">
                      <span class="c_code-validation validation-error"></span></div>

                        <label class="control-label col-sm-2" for="c_name">Course Name:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="c_name" name="c_name" placeholder="Course Name" autocomplete="off" onblur="validate()"></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="c_lec">Lecture Incharge:</label>
                        <div class="col-sm-5">
                          <select id="c_lec" class="form-control" name="c_lec">
                            <option></option>
                            <?php
                            $sqllec = "SELECT * FROM user WHERE role = 1 ORDER BY id";
                            $name = $db->query($sqllec);
                            while($names = mysqli_fetch_assoc($name)) : ?>
                            <option><?= $names['fname']; ?></option>
                          <?php endwhile; ?>
                        </select></div>

                        <label class="control-label col-sm-2" for="c_credits">Course Credit:</label>
                        <div class="col-sm-3">
                            <input type="number" min="1" max="4" class="form-control" id="c_credits" name="c_credits" autocomplete="off" onblur="validate()"> </div>
                    <span class="c_credits-validation validation-error"></span></div>
                </div>
                <div class="modal-footer">
                    <button disabled="disabled" type="submit" class="btn btn-danger" name="add_course" id="add_course"><span class="glyphicon glyphicon-plus"></span> Add</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
