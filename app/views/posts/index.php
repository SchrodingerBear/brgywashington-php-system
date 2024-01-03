<?php
    require APPROOT . '/views/includes/head.php';
?>


<?php
    if($_SESSION['account_type'] == 1){
        require APPROOT . '/views/includes/admin/navigation.php'; 
    }
    if($_SESSION['account_type'] == 2){
        require APPROOT . '/views/includes/bhw/navigation.php'; 
    }
?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Announcements</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Posts</li>
                        </ol>

                            <div class="card mb-4">
                                <div class="card-header">

                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                        <i class="fas fa-users"></i>
                                        Posts Section 
                                        </div>

                                        <div class="">
                                            <button type="button" id="addResidentBtn" class="btn btn-primary btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#modalAddPost">
                                            <i class="fas fa-user-plus"></i>&nbsp; Add Posts
                                            </button>
                                        </div>
                                        <!--div class="">
                                            <a type="button" href="<?php echo URLROOT. '/residents/generate_resident' ?>" id="addResidentBtn" class="btn btn-primary btn-sm">
                                            <i class="fas fa-clipboard-list"></i>&nbsp;Generate List
                                            </a>
                                        </div-->
                                    </div>
                                </div>

                                <div class="card-body " id="printThis">


                                    <table id="datatablesSimple">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Body</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Body</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php foreach ($data['posts'] as $post):?>
                                            <tr>
                                                <td><?php echo $post->id;?></td>
                                                <td><?php echo $post->title;?></td>
                                                <td><?php echo $post->body;?></td>
                                                <td><?php echo date('Y/m/d h:i A', strtotime($post->created_at))?></td>
                                                <td class="d-flex justify-content-evenly">
                                                    <!--button class="btn btn-primary btn-sm rounded-pill viewResidentbtn"  data-bs-toggle="modal" data-id="<//?php echo $post->id?>" data-bs-target="#modalViewPost"><i class="fas fa-file-alt"></i></button-->
                                                    
                                                    <button class="btn btn-success btn-sm rounded-pill editPostbtn" data-bs-toggle="modal" data-id="<?php echo $post->id?>" data-bs-target="#modalEditPost" ><i class="fas fa-edit"></i></button>
                                                    
                                                    
                                                    
                                                    <!--button class="btn btn-success btn-sm rounded-pill editPostbtn" id="editOpen" data-bs-toggle="modal" data-id="<//?php echo $post->id; ?>" data-title="<//?php echo htmlspecialchars($post->title); ?>" data-body="<//?php echo htmlspecialchars($post->body); ?>" data-bs-target="#modalEditPost">
                                                        <i class="fas fa-edit"></i>
                                                    </button-->

                                                    <form action="<?php echo URLROOT?>/posts/delete_posts"  method="POST">
                                                        <input type="hidden" name="id" value="<?php echo $post->id ?>">
                                                        <button type="submit" onclick="postDelete()" class="btn btn-danger btn-sm rounded-pill"><i class="fas fa-trash-alt"></i></button>
                                                    </form>

                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                        

                                </div>

                            </div>







                    </div>
                </main>   

                <!-- Modal for add post -->
                <?php
                    require APPROOT . '/views/posts/modals/modal-add-post.php';
                ?>


                <?php
                    require APPROOT . '/views/posts/modals/modal-edit-post.php';
                ?>


<script>
    function confirmSendMessage(id) {
  Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to send this message?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, send it!'
  }).then((result) => {
      if (result.isConfirmed) {
          // Submit the form if confirmed
          document.getElementById(`messageForm_${id}`).submit();
      }
  });
}
</script>


<?php

    require APPROOT . '/views/includes/footer.php';
?>