<?php

namespace AppBundle\Repository;

/**
 * PlayerRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PlayerRepository extends \Doctrine\ORM\EntityRepository {


    public function getMen() {
        $qb = $this->createQueryBuilder('p');

        $qb->where('p.female = false')
            ->orderBy('p.lastname', 'ASC');

        return $qb->getQuery();
    }


    public function getWomen() {
        $qb = $this->createQueryBuilder('p');

        $qb->where('p.female = true')
            ->orderBy('p.lastname', 'ASC');

        return $qb->getQuery();
    }

    public function getPlayersTeams() {
        $qb = $this->createQueryBuilder('p');

        $qb->addSelect('teams')
            ->leftJoin('p.teams','teams');

        return $qb->getQuery();
    }

    public function getPlayerById($id) {
        $qb = $this->createQueryBuilder('p');

        $qb->where('p.id = ?1')
            ->setParameter(1, $id);

        return $qb->getQuery();
    }

}
