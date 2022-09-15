using System;
using System.Reflection;
using System.Collections;
using System.Collections.Generic;
using NUnit.Framework;
using UnityEngine;
using UnityEngine.TestTools;
using System.IO;
using UnityEditor.TestTools;
using UnityEditor.TestTools.TestRunner;
using UnityEditor.TestTools.TestRunner.Api;
using UnityEngine.TestTools.Constraints;
using UnityEngine.TestTools.Utils;
using UnityEngine.UI;
using UnityEngine.SceneManagement;

public class Modul11Test
{
    bool a = true;
    [Test]
    public void ScoreTest()
    {
        GameObject testObject = MonoBehaviour.Instantiate(Resources.Load<GameObject>("ScoreManager"));
        Modul11 score = testObject.GetComponent<Modul11>();

        float flappyScore = score.score;

        Debug.Log("Initial Score: " + flappyScore);

        score.ScorePoint();
        score.ScorePoint();
        score.ScorePoint();

        Debug.Log("After Score: " + score.score);

        Assert.AreEqual(3, score.score);
    }

    [SetUp]
    public void SetupListeners()
    {
        if (a)
        {
            var api = ScriptableObject.CreateInstance<TestRunnerApi>();
            api.RegisterCallbacks(new Callback());

            a = false;
        }
    }
}
