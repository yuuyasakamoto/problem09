<?php


class Applicants_model extends CI_Model
{
    public function insert(int $pass, string $company, string $department,
                           string $position, string $first_name, string $last_name, string $first_name_hiragana, 
                           string $last_name_hiragana, string $email, string $tel, string $attribute, string $applicant_id,
                           string $payment = NULL, string $receipt_address = NULL)
    {
        $sql = "INSERT INTO applicants(pass, company, department, position, first_name, last_name,
                                    first_name_hiragana, last_name_hiragana, email, tel, attribute, applicant_id,
                                    payment, receipt_address)
                            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        //入力した値をapplicantsテーブルに保存
        $this->db->query($sql, [$pass, $company, $department, $position, $first_name, 
                                $last_name, $first_name_hiragana, $last_name_hiragana, $email, $tel,
                                $attribute, $applicant_id, $payment, $receipt_address]);
        $applicant_id = $this->db->insert_id();
        return $applicant_id;
    }
}

