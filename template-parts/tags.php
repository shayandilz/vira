<?php global $post; ?>
<?php
$posttags = get_the_category();
if ($posttags) { ?>
    <div>
        <h5 class="normal-md-down me-3 mb-0 mt-2 w-max-content">دسته بندی ها</h5>
    </div>

    <div class="hstack flex-wrap">
        <?php foreach ($posttags as $tag) { ?>
            <span class="link-tag m-2">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.83 6.6998L13.3 2.1698C12.35 1.2198 11.04 0.709805 9.69998 0.779805L4.69998 1.0198C2.69998 1.1098 1.10998 2.6998 1.00998 4.6898L0.769975 9.6898C0.709975 11.0298 1.20998 12.3398 2.15998 13.2898L6.68997 17.8198C8.54997 19.6798 11.57 19.6798 13.44 17.8198L17.83 13.4298C19.7 11.5798 19.7 8.5598 17.83 6.6998ZM7.49998 10.3798C5.90998 10.3798 4.61998 9.0898 4.61998 7.4998C4.61998 5.9098 5.90998 4.6198 7.49998 4.6198C9.08998 4.6198 10.38 5.9098 10.38 7.4998C10.38 9.0898 9.08998 10.3798 7.49998 10.3798Z"
                      fill="currentColor"/>
            </svg>
            <span class="ms-1"><?php echo $tag->name ?></span>
        </span>
        <?php } ?>


    </div>
<?php }
?>