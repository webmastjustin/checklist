<?php
include 'includes/page_layout.php';

switch ($_REQUEST['action']) {
	default;
		code_main();
		break;

    case "doc":
        code_doc();
        break;

    case "ref":
        code_ref();
        break;

}


function build_array($array){
    $data = "<ul>";
    foreach ($array as $v ) {
        $value = explode("|",$v);
        if($value[1]){
            $data .= "<li>{$value[0]}</li><ul><li>{$value['1']}</li>";
        }
        if($value[2]){
            $data .= "<li>{$value['2']}</li>";
        }
        if($value[3]){
            $data .= "<li>{$value['3']}</li>";
        }
        if($value[4]){
            $data .= "<li>{$value['4']}</li>";
        }
        if($value[5]){
            $data .= "<li>{$value['5']}</li>";
        }
        if($value[1]) {
            $data .= "</ul>";
        }

    }
    $data .= "</ul>";
    return $data;
}


function code_ref(){

    page_header();
    simple_header("Pocket Tool");
    $array = array(
        1 =>  array(1 => "Admit Source and Admit Type",
                    2 => array("Specify where the patient came from prior to admission (i.e. home, clinic, outside hospital)","Specify if this was an emergent, urgent, or elective admission")
        ),
        2 => array(1 => "Anemia Diagnoses",
                   2 => array("When known, specify etiology/type|Acute and/or chronic blood loss anemia|Anemia due to Chronic kidney disease|Iron Deficiency Anemia|Anemia due to Neoplastic Disease")
        ),
        3 => array(1 => "Brain/Spinal Diagnoses",
            2 => array("Anoxic Brain damage","Brain Death","Compression of Brain","Cerebral edema","Encephalopathy (specify etiology/type if known)","Temporal Sclerosis","Intracranial or Intraspinal abscess")
        ),
        4 => array(1 => "Cancer Diagnoses",
            2 => array(
                "Morphology/Histology (i.e. teratoma, carcinoma in situ, adenocarcinoma, etc)",
                "Origin of Malignancy|Primary|Metastatic and/or Direct extension of a primary malignancy",
                "Location(s) or site(s) (i.e. bone, pelvic lymph node, etc)",
                "Status of Primary and/or Metastatic Cancer|Currently present and under active treatment (i.e. chemotherapy and/or radiation therapy)|
                Previously removed but still under active treatment (i.e. chemotherapy and/or radiation therapy)|Historical (no longer present and not under active treatment)",
                "Identify all manifestations & etiology- mucositis, anemia, and pancytopenia")
        ),
        5 => array(1 => "Circulatory System Diagnoses",
            2 => array("Primary Pulmonary Hypertension","Pulmonary Embolism|Specify whether acute or chronic.","Pulmonary Heart Disease")
        ),
        6 => array(1 => "Coagulopathy Diagnoses",
            2 => array(
                "Coagulopathy -with etiology/type if known (i.e. acquired, congenital, coagulopathy due to liver cirrhosis, due to anticoagulation therapy)",
                "Heparin-induced thrombocytopenia (HIT)")
        ),
        7 => array(1 => "Code Status",
            2 => array("DNR","Limited Code","Full Code")
        ),
        8 => array(1 => "Complication of Care Diagnoses",
            2 => array(
                "Specify anatomical location affected by complication",
                "Specify type of complication (i.e. infection, rejection, mechanical issue)",
                "Identify the medical or surgical treatment that caused the complication")
        ),
        9 => array(1 => "Fluid & Electrolyte Diagnoses",
            2 => array(
                "Acidosis, alkalosis, mixed acid-base disorder",
                "Dehydration, hypovolemia, volume depletion",
                "Fluid overload",
                "Hypernatremia,  hyponatremia, hyperkalemia, hypokalemia, hyperchloremia, hypochloremia",
                "Transfusion-associated circulatory overload")
        ),
        10 => array(1 => "Infection Diagnoses",
            2 => array(
                "Bacterial Infections (i.e. C. Difficile Enteritis)",
                "Fungal Infections",
                "When known, link causative organism to infection with “due to” in documentation.",
                "When known, document if there is drug resistant infection")
        ),
        11 => array(1 => "Liver Diagnoses",
            2 => array(
                "Acute and subacute necrosis of liver",
                "Cirrhosis of liver- when known, specify etiology/type (i.e. alcoholic, autoimmune, biliary)",
                "Esophageal varices due to liver cirrhosis-specify if there is any current associated bleeding",
                "Hepatic encephalopathy",
                "Hepatitis with type and acute or chronic",
                "Hepatorenal syndrome, hepatopulmonary syndrome",
                "Liver Abscess",
                "Perforation of intestine",
                "Peritonitis and retroperitoneal infections",
                "Portal Hypertension")
        ),
        12 => array(1 => "Nutritional Diagnoses",
            2 => array(
                "Abnormal loss of weight and abnormally underweight",
                "Malnutrition (if known specify severity as mild, moderate, or severe)",
                "Obesity|Specify type when known (i.e. Morbid Obesity, Obesity Hypoventilation Syndrome)",
                "Body Mass Index")
        ),
        13 => array(1 => "Psychoses Diagnoses",
            2 => array("Bipolar Disorder","Depression","Schizophrenia")
        ),
        14 => array(1 => "Renal Diagnoses",
            2 => array(
                "Acuity of Renal Failure (i.e. acute, chronic, acute on chronic)",
                "Etiology of Acute and/or Chronic Renal Failure",
                "Stage of Chronic Renal Failure",
                "Noncompliance with Renal Dialysis",
                "Renal Dialysis status",
                "Status post kidney transplant")
        ),
        15 => array(1 => "Respiratory Diagnoses",
            2 => array("Acuity of Respiratory Failure (i.e. acute, chronic, acute on chronic)",
                "Pulmonary Insufficiency",
                "Etiology of respiratory failure or insufficiency when known")
        ),
        16 => array(1 => "Sepsis Diagnoses",
            2 => array(
                "Specify Sepsis as one of the following:|Sepsis|Severe Sepsis|Severe Sepsis with Septic Shock",
                "If there is related organ failure, link to the sepsis in documentation (no assumption can be made if no direct relationship is documented)",
                "When and if known, link the causative organism to the sepsis {(i.e. Sepsis due to ______ (organism name)}")
        ),
        17 => array(1 => "Shock Diagnoses",
            2 => array("When known, specify type and/or cause|Cardiogenic|Complication of Anesthesia or Surgery|Hypovolemic|Septic|	Traumatic|Toxic Shock Syndrome")
        ),

    );

    foreach ($array as $k => $v) {
        $data = "<ul>";
        foreach($v[2] as $list) {
            $value = explode("|", $list);
            if($value[1]) {
                if ($value[1]) {
                    $data .= "<li>{$value[0]}</li><ul><li>{$value['1']}</li>";
                }
                if ($value[2]) {
                    $data .= "<li>{$value['2']}</li>";
                }
                if ($value[3]) {
                    $data .= "<li>{$value['3']}</li>";
                }
                if ($value[4]) {
                    $data .= "<li>{$value['4']}</li>";
                }
                if ($value[5]) {
                    $data .= "<li>{$value['5']}</li>";
                }
                if ($value[1]) {
                    $data .= "</ul>";
                }
            }
            else{
                $data .= "<li>$list</li>";
            }
        }
        $data .= "</ul>";
        $the_data .= "
         <div class='accordion-group'>
                <div class='accordion-heading'>
                    <a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#collapse_$k'>
                        $v[1]
                    </a>
                </div>
                <div id='collapse_$k' class='accordion-body collapse'>
                    <div class='accordion-inner'>
                        $data
                    </div>
                </div>
            </div>

        ";
    }



    echo $the_data;
    echo "<font color='red'><b>General Instructions- It is important to document if a condition were present on admission, developed after admission, or if time of onset cannot be clinically determined.<br>

When possible, link cause and effect to accurately reflect severity. (i.e. gastroparesis due to diabetes, sepsis due to pneumonia, mucositis due to chemo)<br>

When possible, link the organism back to the source infection.<br>

The diagnoses listed here should only be documented if they are clinically relevant to the current admission.</br></font>";
    simple_footer();
    page_footer();
}


function code_main(){
    page_header();
    simple_header("Clinical Documentation Checklist");
    $check = "<br><i class='icon-small icon-ok'></i>";
    $datas = array(
        1 => "<b>Edit</b> any copy and pasted notes?",
        2 => "<b>Use</b> any \"DO NOT USE\" abbreviations (DNUA)?",
        3 => "<b>Complete</b> an H&P within 24 hours of admission and prior to surgery?",
        4 => "<b>Update</b> an H&P completed within 30 days prior to admission? <i>Must include:</i>
                                                $check The patient was re-examined
                                                $check H&P reviewed
                                                $check Changes (or no changes)
                                                $check Signature, date and time",
        5 => "<b>Assign</b> an appropriate admission status? (inpatient, observation, etc.)",
        6 => "<b>Document</b> pressure ulcers presence at admission?",
        7 => "<b>Dictate</b> Operative Report within 24 hours of procedure?",
        8 => "<b>Complete</b> a Post Operative report immediately following procedure?",
        9 => "<b>Complete</b> a Discharge Summary?"


    );
    foreach($datas as $k => $v){
        $table .= "<tr><td width='1%'><input type='checkbox' id='$k'></td><td><label for='$k'>$v</label></td></tr>";
    }
    echo "
    <table class='sortable table-striped table-bordered' id='tblData'>
    <tr><td colspan='2'></td></tr>
        $table

    </table>
    <div class='form-actions'><a href='index.php'><button type='' class='btn btn-primary' name='' value='' >RESET LIST</button></a></div>
    ";

    simple_footer();
    page_footer();
}


function code_doc(){
	page_header();
	simple_header("Clinical Documentation");

    ?>

    <div class="control-group">
        <label class="control-label"></label>
        <div class="controls">
            <div class="accordion" id="accordion2">





                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                            Required Elements of History & Physical (H&P)
                        </a>
                    </div>
                    <div id="collapseOne" class="accordion-body collapse">
                        <div class="accordion-inner">
                            1.Chief complaint<br>
                            2.Details of the present illness (including when appropriate, assessment of the patient’s emotional, behavioral and social status)<br>
                            3.Relevant past, social, and family history<br>
                            4.Inventory of body systems (including mental status)<br>
                            5.Current physical examination<br>
                            6.Allergies/Medications/ Dosage/Reactions<br>
                            7.Conclusions, impressions drawn from admission history and physical examination<br>
                            8.Plan of action<br>
                            9.Dated, <b><u>timed</u></b>, and signed within 24 hours of admission and prior to surgery<br>
                            10.Updated if completed within 30 days prior to admission
                        </div>
                    </div>
                </div>

                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                           Required Elements of a Post-Op Progress Note
                        </a>
                    </div>
                    <div id="collapseTwo" class="accordion-body collapse">
                        <div class="accordion-inner">
                            1.Postoperative diagnosis<br>
                            2.Name of primary surgeon and any assistants<br>
                            3.Technical procedures used<br>
                            4.Description of findings<br>
                            <b>5.Specimens removed*<br>
                            6.Estimated blood loss*<br></b>
                            7.Dated, timed, and signed immediately following surgery<br>
                            <b>* Frequently omitted.</b>
                        </div>
                    </div>
                </div>

                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                            Required Elements of a Post Operative Report
                        </a>
                    </div>
                    <div id="collapseThree" class="accordion-body collapse">
                        <div class="accordion-inner">
                            1.Preoperative diagnosis<br>
                            2.Postoperative diagnosis<br>
                            3.Name of the primary surgeon and any assistants<br>
                            4.Technical procedures used<br>
                            5.Description of the findings<br>
                            <b>6.Specimens removed*<br>
                            7.Estimated blood loss*<br></b>
                            8.Condition of the patient at conclusion of the operation<br>
                            9.Completed within 24 hours of procedure, dated, timed and signed<br>
                            <b>* Frequently omitted.</b>
                        </div>
                    </div>
                </div>

                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
                            Required Elements of Discharge Summary
                        </a>
                    </div>
                    <div id="collapseFour" class="accordion-body collapse">
                        <div class="accordion-inner">
                            1.Provisional diagnosis or reason(s) for admission<br>
                            2.Principal and additional or associated diagnoses<br>
                            3.All relevant diagnoses established by the time of discharge<br>
                            4.Significant findings<br>
                            5.Procedures performed and treatment rendered<br>
                            6.Condition of the patient on discharge<br>
                            7.Specific instructions given to the patient and/or family (especially relating to the physical activity, diet, medications, & follow-up care)<br>
                            8.Dictated at time of discharge, dated, <b><u>timed</u></b>, and signed<br>
                        </div>
                    </div>
                </div>

            </div>
        </div> <!-- /controls -->
    </div> <!-- /control-group -->



<?php


	simple_footer();
	page_footer();
}