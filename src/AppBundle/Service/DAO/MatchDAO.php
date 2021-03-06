<?php

namespace AppBundle\Service\DAO;

use AppBundle\Entity\TennisMatch;
use AppBundle\Repository\TennisMatchRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManager;

/**
 * Class MatchDAO
 * @package AppBundle\Service\DAO
 */
class MatchDAO
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * MatchDAO constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        // keep reference of the EntityManager
        $this->em = $entityManager;
    }

    public function saveMach(){

    }

    public function saveDuoMatch(TennisMatch $tennisMatch){

        $this->em->persist($tennisMatch);
        $this->em->flush();
    }

    /**
     * @return Collection
     * @throws \Exception
     */
    public function getAllMatchsScored()
    {
        // get repository
        $repo = $this->getRepository();

        try {
            // get the query
            $query = $repo->getAllMatchsScored();

            // return results find
            return new ArrayCollection($query->getResult());
        } catch (\Exception $exception) {
            throw new \Exception(
                "Une erreur est survenue lors de le recherche des matches.",
                null,
                $exception
            );
        }
    }

    public function getAllDuoMatchs(){

    }

    public function getAllSimpleMarchs(){

    }

    /**
     * @return TennisMatchRepository
     */
    private function getRepository()
    {
        return $this->em->getRepository(TennisMatch::class);
    }
}