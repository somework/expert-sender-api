<?php

namespace LinguaLeo\ExpertSender\Entities;

class StateOnList
{
    /**
     * @var string
     */
    private $listId;

    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $status;
    /**
     * @var \DateTime
     */
    private $subscribedOn;

    /**
     * StateOnList constructor.
     *
     * @param string    $listId
     * @param string    $name
     * @param string    $status
     * @param \DateTime $subscribedOn
     */
    public function __construct($listId, $name, $status, $subscribedOn)
    {
        $this->listId = $listId;
        $this->name = $name;
        $this->status = $status;
        $this->subscribedOn = $subscribedOn;
    }

    /**
     * @return string
     */
    public function getListId()
    {
        return $this->listId;
    }

    /**
     * @param string $listId
     *
     * @return StateOnList
     */
    public function setListId($listId)
    {
        $this->listId = $listId;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return StateOnList
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return StateOnList
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getSubscribedOn()
    {
        return $this->subscribedOn;
    }

    /**
     * @param \DateTime $subscribedOn
     *
     * @return StateOnList
     */
    public function setSubscribedOn($subscribedOn)
    {
        $this->subscribedOn = $subscribedOn;
        return $this;
    }
}
