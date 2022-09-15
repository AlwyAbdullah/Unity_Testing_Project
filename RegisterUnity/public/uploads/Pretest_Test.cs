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

public class Pretest_Test
{
    bool a = true;
    // A Test behaves as an ordinary method
    [Test]
    public void PositionTest()
    {
        GameObject testObject = GameObject.Find("Pretest");
        Pretest pretest = testObject.GetComponent<Pretest>();

        Debug.Log("Before Move: " + pretest.transform.position);

        string x = testObject.transform.position.ToString();

        // Call (send message to) the method MoveLeft().
        pretest.MoveDown();
        pretest.MoveDown();
        pretest.MoveRight();
        pretest.MoveRight();
        pretest.MoveRight();
        pretest.MoveUp();
        pretest.MoveLeft();

        Debug.Log("After Move: " + pretest.transform.position);

        // Save the updated x position.
        string updatedX = testObject.transform.position.ToString();

        Assert.AreEqual("(2.00, -1.00, 0.00)", updatedX);
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
