<?php

namespace Calendar;

class Events {

    private $pdo;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Récupère les évènements entre deux dates
     * @param \DateTime $start
     * @param \DateTime $end
     * @return array
     */
    public function getEventsBetween(\DateTime $start, \DateTime $end): array {
        $sql = "SELECT *"
                . " FROM events"
                . " WHERE start BETWEEN '{$start->format('Y-m-d 00:00:00')}' AND '{$end->format('Y-m-d 23:59:59')}'"
                . " ORDER BY start ASC";
        $statement = $this->pdo->query($sql);
        $results = $statement->fetchAll();
        return $results;
    }

    /**
     * Récupère les évènements entre deux dates indexer par jour
     * @param \DateTime $start
     * @param \DateTime $end
     * @return array
     */
    public function getEventsBetweenByDay(\DateTime $start, \DateTime $end): array {
        $events = $this->getEventsBetween($start, $end);
        $days = [];
        foreach ($events as $event) {
            $date = explode(" ", $event['start'])[0];
            if (!isset($days[$date])) {
                $days[$date] = [$event];
            } else {
                $days[$date][] = $event;
            }
        }
        return $days;
    }

    /**
     * Récupère un évènement
     * @param int $id
     * @return Event Description
     */
    public function find(int $id): Event {
        $statement = $this->pdo->query("SELECT * FROM events WHERE id = $id");
        $statement->setFetchMode(\PDO::FETCH_CLASS, Event::class);
        $result = $statement->fetch();
        if ($result === false) {
            throw new \Exception("Aucun résultat n'a été trouvé");
        }
        return $result;
    }

    /**
     * Créer un évènement
     * @param \Calendar\Event $event
     * @return type
     */
    public function create(Event $event) {
        $statement = $this->pdo->prepare('INSERT INTO events (name, description, start, end) VALUES (?,?,?,?)');
        return $statement->execute([
                    $event->getName(),
                    $event->getDescription(),
                    $event->getStart()->format('Y-m-d H:i:s'),
                    $event->getEnd()->format('Y-m-d H:i:s')
        ]);
    }

    /**
     * Mettre à jour un évènement
     * @param \Calendar\Event $event
     * @return type
     */
    public function update(Event $event) {
        $statement = $this->pdo->prepare('UPDATE events SET name = ?, description = ?, start = ? , end = ? WHERE id = ?');
        return $statement->execute([
                    $event->getName(),
                    $event->getDescription(),
                    $event->getStart()->format('Y-m-d H:i:s'),
                    $event->getEnd()->format('Y-m-d H:i:s'),
                    $event->getId()
        ]);
    }

}
