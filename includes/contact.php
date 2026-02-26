<?php 

    global $wpdb;
    $table = $wpdb->prefix . 'wpnc_form_data';

    $results = $wpdb->get_results(
        "SELECT * FROM $table ORDER BY id DESC"
    );

    ?>
        <div class="wrap">
            <h2>Contact Submissions result.</h2>
            <p><strong>Total:</strong><?php echo count($results); ?></p>

            <table class="widegat striped wrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Massage</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if( $results ):
                            $i = 1;
                            foreach( $results as $row):
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo esc_html($row->name); ?></td>
                        <td><?php echo esc_html($row->company); ?></td>
                        <td><?php echo esc_html($row->email); ?></td>
                        <td><?php echo esc_html($row->phone); ?></td>
                        <td><?php echo esc_html($row->message); ?></td>
                        <td><?php echo esc_html($row->created_at); ?></td>
                    </tr>
                    <?php 
                        endforeach;
                        else:
                    ?>
                    <tr>
                        <td colspan="5">No Data found!</td>
                    </tr>
                    <?php endif; ?>

                </tbody>
            </table>

        </div>

    <?php
