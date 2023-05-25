<?php /* Template Name: Excel */
get_header();
?>
    <section class="container-fluid mt-5">
        <div class="position-relative min-vh-100 d-flex flex-column justify-content-center align-items-center">
            <div class="p-4 bg-white border-1 border-dark rounded-1 text-center w-100">
                <h5 class="my-3">لیست نمایندگان فعال</h5>
                <div class="row align-content-center justify-content-between g-3">
                    <div class="col-lg-8 d-inline-flex gap-3">
                        <div class="col-lg-4 d-inline-flex align-items-center gap-2">
                            <select class="form-select" aria-label="Default select example" id="dropdown">
                                <option value="" selected disabled>استان</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <input class="form-control" type="text" id="searchInput" placeholder="جستجو بر اساس شهر، استان و آدرس">
                        </div>
                    </div>
                    <div class="col-lg-2 d-inline-flex align-items-center justify-content-center gap-2">
                        <span class="small">
                        تعداد نمایش
                    </span>
                        <select class="form-select w-50" aria-label="Default select example" id="rowsPerPage">
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="75">75</option>
                        </select>
                    </div>
                </div>
                <hr>
                <table class="table d-inline align-middle table-hover table-striped representation-table table-responsive" id="myTable">
                    <thead>
                    <tr>
                        <th class="fw-normal">
                            ردیف
                            <span class="bi bi-sort-up d-none"></span>
                            <span class="bi bi-sort-down d-none"></span>
                        </th>
                        <th class="fw-normal">وضعیت</th>
                        <th class="fw-normal">استان</th>
                        <th class="fw-normal">شهر</th>
                        <th class="fw-normal">نام و نام خانوادگی</th>
                        <th class="fw-normal">راه‌های ارتباطی</th>
                    </thead>
                    <tbody>

                    <?php if (have_rows('excel_data')):
                        $i = 0;
                        while (have_rows('excel_data')) : the_row();
                            $i++;
                            ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= get_sub_field('status'); ?></td>
                                <td><?= get_sub_field('state'); ?></td>
                                <td><?= get_sub_field('city'); ?></td>
                                <td><?= get_sub_field('name'); ?></td>
                                <td>
                                    <?php
                                    if (get_sub_field('more')) { ?>
                                        <button type="button" class="btn btn-primary rounded-circle" data-bs-toggle="modal"
                                                data-bs-target="#modal<?= $i; ?>">
                                            <i class="bi bi-search"></i>
                                        </button>

                                    <?php }
                                    ?>
                                </td>
                            </tr>
                        <?php
                        endwhile;
                    endif; ?>

                    </tbody>
                </table>
            </div>
            <?php if (have_rows('excel_data')):
                $i = 0;
                while (have_rows('excel_data')) : the_row();
                    $i++;

                    if (get_sub_field('more')) { ?>
                        <!-- Modal -->
                        <div class="modal fade" id="modal<?= $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center d-flex flex-column">
                                        <button type="button" class="close position-absolute ms-4 top-0 start-0 btn-danger btn fs-3 border-0" data-dismiss="modal" aria-hidden="true">
                                            <i data-bs-dismiss="modal" aria-label="Close" class="bi bi-x"></i>
                                        </button>
                                        <h1 class="modal-title fs-5 mt-4" id="exampleModalLabel">مشخصات</h1>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        $modalMore = get_sub_field('more');
                                        ?>
                                        <p class="fw-bold text-black fs-6"><i class="bi bi-telephone-fill text-red"></i></i> شماره ثابت</p>
                                        <p class="fs-6">
                                            <?= $modalMore['phone']; ?>
                                        </p>
                                        <p class="fw-bold text-black fs-6"><i class="bi bi-phone-fill"></i>شماره همراه </p>
                                        <p>
                                            <?= $modalMore['mobile']; ?>
                                        </p>
                                        <hr>
                                        <p class="fw-bold text-black fs-6"><i class="bi bi-envelope-fill"></i> آدرس الکترونیک:</p>
                                        <p>
                                            <?= $modalMore['email']; ?>
                                        </p>
                                        <p class="fw-bold text-black fs-6"><i class="bi bi-house-door-fill"></i> آدرس منزل:</p>
                                        <p>
                                            <?= $modalMore['Address']; ?>
                                        </p>
                                        <p class="fw-bold text-black fs-6"><i class="bi bi-building-fill"></i> آدرس دفتر:</p>
                                        <p>
                                            <?= $modalMore['office']; ?>
                                        </p>
                                        <p class="fw-bold text-black fs-6"><i class="bi bi-mailbox2"></i> کد پستی:</p>
                                        <p>
                                            <?= $modalMore['postal']; ?>
                                        </p>
                                    </div>
                                    <div class="modal-footer text-left">
                                        <button type="button" class="btn btn-primary btn-round" data-bs-dismiss="modal" aria-label="Close">بستن
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php }
                endwhile;
            endif; ?>

        </div>
    </section>


<?php get_footer();



