<?php
class Schedule extends Database
{

    public function getAllDoctor()
    {
        $sql = "
            SELECT *
            FROM doctor
        ";
        $stmt = $this->conn->prepare($sql);

        $stmt->execute();
        //fetch for single and fetchAll for multiple
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insertSchedule($purposeToAppoint, $doctorId, $sessionDate,
        $scheduleTime)
    {

        $sql = "
            INSERT INTO schedule_session(doc_id,purpose_to_appoint,session_date,session_time,date_time_created)
            VALUES (:doctorId, :purposeToAppoint, :sessionDate, :scheduleTime, NOW())
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':purposeToAppoint', $purposeToAppoint);
        $stmt->bindParam(':doctorId', $doctorId);
        $stmt->bindParam(':sessionDate', $sessionDate);
        $stmt->bindParam(':scheduleTime', $scheduleTime);

        $stmt->execute();

        return true;
    }

    public function checkIfAlreadyInSchedule($sessionDate, $scheduleTime)
    {
        $sql = "
            SELECT * FROM schedule_session WHERE session_date LIKE '%".$sessionDate."%' AND session_time = :scheduleTime
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':scheduleTime', $scheduleTime);
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }

}