<?php if (!$settings["back_operation"]) { ?>
    <section class="pdocrud-table-container" data-objkey="<?php echo $objKey; ?>" <?php if (!empty($modal)) { ?> data-modal="true"<?php } ?> >
    <?php } ?>
    <div class="panel panel-priamry">
        <div class="alert alert-success hidden pdocrud_message" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only"><?php echo $lang["message"]; ?> :</span>
            <span class="message_content"><?php if(isset($_SESSION["message"])) echo $_SESSION["message"];?></span>
        </div>
        

        <div class="panel-body pdocrudbox pdocrud-top-buttons">
            
            <?php if(isset($extraData["dateRangeReport"])) { ?>
            <div class="row" style="padding-bottom: 5px">
                <?php foreach($extraData["dateRangeReport"] as $key => $dateRange ) {?>
                        <div class="col-sm-2">
                            <a title="<?php echo $dateRange["text"]; ?>" class="pdocrud-actions pdocrud-button pdocrud-date-range-report"
                               href="javascript:;" data-action="date_range_report" data-action-id="<?php echo $key;?>" data-obj-key="<?php echo $objKey; ?>">
                                <?php echo $dateRange["text"];?>
                            </a>
                        </div>
                <?php 
                }?>
            </div>
            <?php } ?>
            <div class="row">
                <div class="col-sm-12">
                    <?php echo $data; ?>
                </div>
            </div>
            <div class="row pdocrud-options-files">
                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <ul class="pdocrud-export-options">
                            <?php if ($settings["printBtn"]) { ?>
                                <li><a title="<?php echo $lang["print"]; ?>" class="pdocrud-actions pdocrud-button pdocrud-button-export" href="javascript:;" data-action="exporttable" data-export-type="print" data-objkey="<?php echo $objKey; ?>"><?php echo $lang["print"]; ?></a></li>
                            <?php
                            }
                            if ($settings["csvBtn"]) {
                                ?> 
                                <li><a title="<?php echo $lang["csv"]; ?>" class="pdocrud-actions pdocrud-button pdocrud-button-export" href="javascript:;" data-action="exporttable" data-export-type="csv" data-objkey="<?php echo $objKey; ?>"><?php echo $lang["csv"]; ?></a></li>
                            <?php
                            }
                            if ($settings["pdfBtn"]) {
                                ?>
                                <li><a title="<?php echo $lang["pdf"]; ?>"class="pdocrud-actions pdocrud-button pdocrud-button-export" href="javascript:;" data-action="exporttable" data-export-type="pdf" data-objkey="<?php echo $objKey; ?>"> <?php echo $lang["pdf"]; ?></a></li>                            
                            <?php } if ($settings["excelBtn"]) { ?>
                                <li><a title="<?php echo $lang["excel"]; ?>" class="pdocrud-actions pdocrud-button pdocrud-button-export" href="javascript:;" data-action="exporttable" data-export-type="excel" data-objkey="<?php echo $objKey; ?>"><?php echo $lang["excel"]; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="col-sm-6 ">
                        <div class="pull-right">
                            <?php if ($settings["pagination"]) { ?>
                                <div class="btn-group pdocrud-pagination">
                                    <?php echo $pagination; ?>
                                </div>
                            <?php } ?>      
                            <?php if ($settings["recordsPerPageDropdown"]) { ?>
                                <div class="btn-group pull-right">
                                    <?php echo $perPageRecords; ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                </div>  
            </div>  
        </div><!-- /.box-body -->
    </div><!-- /.box -->
<?php echo $modal; ?>  
<?php if (!$settings["back_operation"]) { ?>
    </section><!-- /.content -->
<?php
}?>