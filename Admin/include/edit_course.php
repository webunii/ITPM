<!--Edit Item Modal -->
<div id="edit<?= $id; ?>" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <form method="post" class="form-horizontal" role="form" name="myForm" onsubmit="return checkvalidate()">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Course</h4>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="edit_course_id" value="<?= $id; ?>">

                  <div class="form-group">
                    <label class="control-label col-sm-2" for="ec_code">Course Code: </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="ec_code" name="ec_code" onblur="checkvalidate()" autocomplete="off" value="<?= $c['c_code']; ?>">
                    <span class="c_code-validation validation-error"></span></div>
                      <label class="control-label col-sm-2" for="ec_name">Course Name:</label>
                      <div class="col-sm-5">
                          <input type="text" class="form-control" id="ec_name" name="ec_name" onblur="checkvalidate()" autocomplete="off" value="<?= $c['c_name']; ?>">
                      </div>
                  </div>
                  <br><br>
                  <div class="form-group">
                      <label class="control-label col-sm-2" for="ec_lec">Lecture Incharge:</label>
                      <div class="col-sm-5">
                        <select id="ec_lec" class="form-control" name="ec_lec">
                          <option><?= $c['c_incharge']; ?></option>
                          <?php
                          $sqllec = "SELECT * FROM user WHERE role = 1 ORDER BY id";
                          $name = $db->query($sqllec);
                          while($names = mysqli_fetch_assoc($name)) : ?>
                          <option><?= $names['fname'].' '.' '.$names['lname']; ?></option>
                        <?php endwhile; ?>
                      </select>                      </div>

                      <label class="control-label col-sm-2" for="ec_credits">Course Credit:</label>
                      <div class="col-sm-3">
                          <input type="number" min="1" max="4" class="form-control" id="ec_credits" name="ec_credits" autocomplete="off" value="<?= $c['c_credits']; ?>">
                     </div>
                  <span class="c_credits-validation validation-error"></span>
                </div>
                <br>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" name="edit" id="edit"><span class="glyphicon glyphicon-edit"></span> Edit</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                </div>

                </form>
            </div>
        </div>
</div>
