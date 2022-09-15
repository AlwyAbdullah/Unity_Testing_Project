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

public class Modul13Test
{
    bool a = true;

    [Test]
    public void AllTest()
    {
        GameObject testObject = MonoBehaviour.Instantiate(Resources.Load<GameObject>("AllModul"));
        Modul13 modul13 = testObject.GetComponent<Modul13>();

        testObject.transform.position = Vector2.MoveTowards(testObject.transform.position, testObject.transform.right * 300, Time.deltaTime * -2);
        Debug.Log(testObject.transform.position);
        string x = testObject.transform.position.ToString();

        // string x = movements.rb.velocity.ToString();
        Debug.Log("Before Move: " + x);

        //Modul9
        modul13.MovePipe();
        modul13.MovePipe();
        x = testObject.transform.position.ToString();

        Debug.Log("After Move: " + x);

        Assert.AreEqual("(0.35, -0.07, 0.00)", x);


        //Modul10
        modul13.rb = testObject.GetComponent<Rigidbody2D>();

        string y = modul13.rb.velocity.ToString();
        Debug.Log("Before Jump: " + y);

        modul13.Jump();

        y = modul13.rb.velocity.ToString();
        Debug.Log("After Jump: " + y);

        Assert.AreEqual("(0.00, 8.00)", y);

        //Modul11
        float flappyScore = modul13.score;

        Debug.Log("Initial Score: " + flappyScore);

        modul13.ScorePoint();
        modul13.ScorePoint();
        modul13.ScorePoint();

        Debug.Log("After Score: " + modul13.score);

        Assert.AreEqual(3, modul13.score);

        //Modul12
        modul13.spawn();
        Debug.Log("Position: " + modul13.position);
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
