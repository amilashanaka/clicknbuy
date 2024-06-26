 <?php include_once './header.php';

include_once './controllers/index.php';

if( $user->get_all_users()['error']==null){$list = $user->get_all_users()['data'];}else{$list =null;}



?>

 <?php include_once './navbar.php'; ?>

 <?php include_once './sidebar.php'; ?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->

     <?php
            $t1 =$lang['SM3'] ;
            $t2 = $lang['List'];

            include_once './page_header.php';
            ?>
     <!-- Main content -->
     <section class="content">
         <div class="row">
             <div class="col-12">
                 <!-- /.card -->
                 <div class="card">
                     <?php if ($_SESSION['role'] < 2) { ?>
                     <div class="card-header">
                         <h3 class="card-title">
                             <div class="row">
                                 <div class="col6">
                                     <button type="button" class="btn btn-app"
                                         onclick="location.href = 'user.php'"><i
                                             class="fas fa-user-plus"></i>Add New <?= $lang['SM3']  ?></button>
                                 </div>
                             </div>
                         </h3>
                     </div>
                     <?php } ?>
                     <!-- /.card-header -->
                     <div class="card-body">
                         <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                             cellspacing="0" width="100%">
                             <thead>
                                 <tr>
                                     <th>#</th>
                                     <th><?= $lang['user-f1'] ?></th>
                                     <th><?= $lang['user-f2'] ?></th>
                                     <th><?= $lang['user-f3'] ?></th>
                                     <th><?= $lang['user-f4'] ?></th>
                                     <th style="width:3%; text-align: center;"><?= $lang['Action'] ?></th>
                                 </tr>
                             </thead>
                             <tfoot>
                                 <tr>
                                     <th>#</th>
                                     <th><?= $lang['user-f1'] ?></th>
                                     <th><?= $lang['user-f2'] ?></th>
                                     <th><?= $lang['user-f3'] ?></th>
                                     <th><?= $lang['user-f4'] ?></th>
                                     <th style="width:3%; text-align: center;"><?= $lang['Action'] ?></th>
                                 </tr>
                             </tfoot>
                             <tbody>
                                 <?php $i = 1;
                                 if($list!=null){
                                foreach ($list as $row) { ?>
                                 <tr>
                                     <td><?php echo $i++; ?></td>
                                     <td><a href="user?id=<?php echo base64_encode($row['id']); ?>"><?= $row['f1'] ?></a></td>
                                     <td><?php echo $row['f2']; ?></td>
                                     <td><?php echo $row['f3']; ?></td>
                                     <td><?php echo printDate($row['register_date']); ?></td>
                                     <td><?php if ($row['status'] == '1') { ?> <button type="button" id="btnm<?php echo $row['id']; ?>" class="btn btn-block btn-outline-danger btn-flat" onclick="delete_record('<?php echo $row['id']; ?>', 'users', 'id', 'user_list','<?php echo base64_encode(3); ?>');"><i class="fa fa-times"></i> <?php } else { ?> <button type="button" id="btnm<?php echo $row['id']; ?>" class="btn btn-block btn-outline-success btn-flat" onclick="activate_record('<?php echo $row['id']; ?>', 'users', 'id', 'user_list','<?php echo base64_encode(3); ?>');"><i class="fa fa-check "></i> </button> <?php } ?> </td>
 
                                 </tr>
                                 <?php } }?>
                             </tbody>
                         </table>
                     </div>
                     <!-- /.card-body -->
                 </div>
                 <!-- /.card -->
             </div>
             <!-- /.col -->
         </div>
         <!-- /.row -->
     </section>
     <!-- /.content -->


 </div>
 <?php include_once './footer.php'; ?>

 </body>

 </html>