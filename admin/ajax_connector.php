<?php
	$type = $_REQUEST['type'];
	if($type=="AC")
	{
	?>	
		<select class="form-control" id="connector" name="connector" required>
            <option value="">Select</option>
            <option value="J1772" <?php if($fetchrow['connector']=="J1772"){?> selected <?php }?>>J1772</option>
            <option value="Menekes Type2" <?php if($fetchrow['connector']=="Menekes Type2"){?> selected <?php }?>>Menekes Type2</option>
            <option value="GB/T" <?php if($fetchrow['connector']=="GB/T"){?> selected <?php }?>>GB/T</option>
        </select>	
	<?php
    }
	else
	{
?> 
		<select class="form-control" id="connector" name="connector" required>
            <option value="">Select</option>
            <option value="CCS" <?php if($fetchrow['connector']=="CCS"){?> selected <?php }?>>CCS</option>
            <option value="CHADeMo" <?php if($fetchrow['connector']=="CHADeMo"){?> selected <?php }?>>CHADeMo</option>
            <option value="CCS2" <?php if($fetchrow['connector']=="CCS2"){?> selected <?php }?>>CCS2</option>
            <option value="GB/T" <?php if($fetchrow['connector']=="GB/T"){?> selected <?php }?>>GB/T</option>
        </select>
    <?php
	}
	?>    